<template>
  <div class="m-4 p-2">
    <FullCalendar :options="calendarOptions" class="milcho-custom-calendar" />

    <Dialog v-model:visible="visible" modal header="일정 등록" :style="{ width: '40rem' }">
      <div class="">
        <span class="text-surface-500 dark:text-surface-400 block mb-1">시작일 : {{ form.startDateText }} </span>
        <DatePicker id="datepicker-timeonly" v-model="form.startTime" timeOnly fluid />
        <span class="text-surface-500 dark:text-surface-400 block mb-1">마감일 : {{ form.endDateText }}</span>
        <DatePicker id="datepicker-timeonly" v-model="form.endTime" timeOnly fluid />
      </div>

      <Divider> </Divider>
      <div class="flex items-center gap-4 mb-4">
        <label for="title" class="font-semibold w-24">제목</label>
        <InputText id="title" v-model="form.title" class="flex-auto" autocomplete="off" />
      </div>
      <div class="flex items-center gap-4 mb-4">
        <label for="board_id" class="font-semibold w-24 mr-4">일정 선택</label>
        <Select v-model="form.board_id" :options="unregist_board" optionLabel="title" optionValue="id"
          placeholder="일정 게시글을 선택하세요." v-if="!isEditing" checkmark :highlightOnSelect="false" class="w-full " />
          <Select v-model="form.board_id" :options="unregist_board" optionLabel="title" optionValue="id"
          :placeholder="getBoardTitle(form.board_id)" v-else checkmark :highlightOnSelect="false" disabled class="w-full " />
        
      </div>
      <div class="flex items-center gap-4 mb-4">
        <label for="type" class="font-semibold w-24">상태</label>
        <InputText id="type" v-model="form.type" class="flex-auto" autocomplete="off" />
      </div>
      <div class="flex justify-end gap-2">
        <Button type="button" label="Cancel" severity="secondary" @click="visible = false"></Button>
        <Button type="button" label="Save" @click="saveEvent"></Button>
      </div>
    </Dialog>
    
    <Dialog v-model:visible="eventDetailVisible" modal :header="form.title" :style="{ width: '40rem' }">
      <div>
        <div class="flex justify-between">
          <p><strong>시작일:</strong> {{ form.startDateText }}</p>
          <p><strong>마감일:</strong> {{ form.endDateText }}</p>
          <Tag severity="secondary" :value="form.type"></Tag>
        </div>
      </div>
        <p><strong>일정 생성자</strong> {{ form.author }}</p>
        <Divider></Divider>
        <div v-if="matchedBoard" class="mt-3">
          <Card>
            <template #content>
              <div>
                <Link
                  :href="`/board/${form.board_id}`">
                  <p><strong>{{ matchedBoard.title }}</strong></p>
                </Link>
              </div>
              <p class="flex justify-end">{{ matchedBoard.author }}</p>
              <Divider></Divider>
              {{ matchedBoard.content }}
            </template>
          </Card>
        </div>
      <div class="flex justify-end mt-4">
        <div v-if="form.author == page.props.auth.user.id">
          <Button label="수정" class="w-15 mr-1.5" @click="editButtonClick"/> 
          <Link :href="`/calendar/delete/${form.id}`" method="delete">
              <Button label="삭제" severity="warn" outlined class="w-15" /> 
          </Link> 
        </div>
      </div>
    </Dialog>
  </div>
</template>

<script setup>
import { ref, reactive } from 'vue';
import { useForm, usePage, Link } from '@inertiajs/vue3';
import FullCalendar from '@fullcalendar/vue3';
import dayGridPlugin from '@fullcalendar/daygrid';
import timeGridPlugin from '@fullcalendar/timegrid';
import interactionPlugin from '@fullcalendar/interaction';

const isEditing = ref(false);
const selectedEvent = ref(null);
const visible = ref(false);
const eventDetailVisible = ref(false);
const page = usePage();

const form = useForm({
  id: null,
  title: '',
  board_id: '',
  author: page.props.auth.user.id,
  startDate: new Date(),
  endDate: new Date(),
  startDateText: '',
  endDateText: '',
  startTime:'',
  endTime:'',
  type: '',
});

const unregist_board = page.props.boards.filter(
    (board) => board.calendar_id === null
  );

const getBoardTitle = (boardId) => {
  const board = page.props.boards.find(
    (board) => board.id === Number(boardId)
  );
  return board ? board.title : '게시글을 찾지 못했습니다.';
}

const formatDate = (date) => {
  const d = new Date(date);
  let month = '' + (d.getMonth() + 1);
  let day = '' + d.getDate();
  const year = d.getFullYear();

  if (month.length < 2) month = '0' + month;
  if (day.length < 2) day = '0' + day;

  return [year, month, day].join('-');
};

const handleDateClick = (info) => {
  visible.value = true;
  isEditing.value = false;
  Object.assign(form, {
    startDate: info.date,
    endDate: info.date,
    startDateText: formatDate(info.date),
    endDateText: formatDate(info.date),
  });
  selectedEvent.value = null;
};

const handleDateSelect = (selectInfo) => {
  console.log('dateSelect');
  visible.value = true;
  Object.assign(form, {
    startDate: selectInfo.start,
    endDate: selectInfo.end,
    startDateText: formatDate(selectInfo.start),
    endDateText: formatDate(new Date(selectInfo.end.getTime() - 1)),
  });

  selectedEvent.value = null;

}

const matchedBoard =ref(null);
const formatDateTime =(date)=>{
  const formatted = date.toLocaleString('ko-KR', {
    year: 'numeric',
    month: '2-digit', 
    day: '2-digit',
    hour: '2-digit',
    minute: '2-digit',
    hour12: false
  });
  return formatted;
}
const handleEventClick = (eventClickInfo ) => {
  const event = eventClickInfo.event;

  matchedBoard.value = page.props.boards.find(
    (board) => board.id === Number(event.extendedProps.board_id)
  );
  eventDetailVisible.value = true;
  isEditing.value = false; 

  Object.assign(form, {
    id: event.id,
    title: event.title,
    startDate: event.start,
    endDate: event.end,
    startDateText: formatDateTime(event.start),
    endDateText: formatDateTime(event.end),
    type: event.extendedProps.type,
    board_id: event.extendedProps.board_id,
    author: event.extendedProps.author,
  });

  console.log("event form값: ", form)
};
const calendarOptions = reactive({
  plugins: [dayGridPlugin, interactionPlugin, timeGridPlugin],
  initialView: 'dayGridMonth',
  headerToolbar: {
    left: 'prev,next today',
    center: 'title',
    right: 'dayGridMonth,timeGridWeek,timeGridDay',
  },
  views: {
    dayGridMonth: {
      buttonText: '월별',
    },
    timeGridWeek: {
      buttonText: '주별',
    },
    timeGridDay: {
      buttonText: '일별',
    },
  },
  events: page.props.events,
  editable: true,
  selectable: true,
  select: handleDateSelect,
  dateClick: handleDateClick,
  eventClick: handleEventClick,
  locale: 'ko',
});
const editButtonClick = () =>{
  eventDetailVisible.value=false;
  visible.value=true;
  isEditing.value=true;

  Object.assign(form, {
    startDateText: formatDate(form.startDate),
    endDateText: formatDate(form.endDate),
  });

}
const saveEvent = (info) => {
  form.startTime = form.startTime?.toTimeString().substring(0, 5) || '';
  form.endTime = form.endTime?.toTimeString().substring(0, 5) || '';

  if(isEditing){
    form.put(`/calendar/event/${form.id}`, {
    onSuccess: () => {
      form.reset();
      visible.value = false;
      isEditing=false;
    },
    onError: (errors) => {
      console.log(errors);
    }
  })
  }
  else{
    form.post('/calendar/event', {
    onSuccess: () => {
      form.reset();
      visible.value = false;
    },
    onError: (errors) => {
      console.log(errors);
    }
  })
  }
  
} 
</script>