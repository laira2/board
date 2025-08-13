<template>
  <div>
    <FullCalendar :options="calendarOptions" class="milcho-custom-calendar" />

    <Dialog v-model:visible="visible" modal header="일정 등록" :style="{ width: '40rem' }">
      <div class="">
        <span class="text-surface-500 dark:text-surface-400 block mb-1">시작일 : {{ form.startDateText }} </span>
        <span class="text-surface-500 dark:text-surface-400 block mb-1">마감일 : {{ form.endDateText }}</span>
      </div>

      <Divider> </Divider>
      <div class="flex items-center gap-4 mb-4">
        <label for="title" class="font-semibold w-24">제목</label>
        <InputText id="title" v-model="form.title" class="flex-auto" autocomplete="off" />
      </div>
      <div class="flex items-center gap-4 mb-4">
        <label for="board_id" class="font-semibold w-24 mr-4">일정 선택</label>
        <Select v-model="form.board_id" :options="page.props.boards" optionLabel="title" optionValue="id"
          placeholder="일정 게시글을 선택하세요." checkmark :highlightOnSelect="false" class="w-full " />
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
    
    <Dialog v-model:visible="eventDetailVisible" modal header="일정 정보" :style="{ width: '40rem' }">
      <div>
        <p><strong>제목:</strong> {{ form.title }}</p>
        <p><strong>시작일:</strong> {{ form.startDateText }}</p>
        <p><strong>마감일:</strong> {{ form.endDateText }}</p>
        <p><strong>타입:</strong> {{ form.type }}</p>
        <p><strong>작성자 ID:</strong> {{ form.author }}</p>
        <p><strong>게시글 ID:</strong> {{ form.board_id }}</p>
      </div>

      <div class="flex justify-end mt-4">
        <Button label="닫기" @click="visible = false" />
      </div>
    </Dialog>
  </div>
</template>

<script setup>
import { ref, reactive } from 'vue';
import { useForm, usePage, } from '@inertiajs/vue3';
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
  type: '',
});

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
  console.log('clicked date:', info.date, typeof info.date);
  visible.value = true;
  isEditing.value = false;
  Object.assign(form, {
    startDate: info.date,
    endDate: info.date,
    startDateText: formatDate(info.date),
    endDateText: formatDate(info.date),
  });
  console.log('assigned form : ', form);
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

  console.log('assigned form : ', form);
  selectedEvent.value = null;

}

const handleEventClick = (eventClickInfo ) => {
  const event = eventClickInfo.event;

  console.log("handleEventClick 실행");
  console.log(event);
  eventDetailVisible.value = true;
  isEditing.value = false; 

  Object.assign(form, {
    id: event.id,
    title: event.title,
    startDate: event.start,
    endDate: event.end,
    startDateText: formatDate(event.start),
    endDateText: formatDate(event.end),
    type: event.extendedProps.type,
    board_id: event.extendedProps.board_id,
    author: event.extendedProps.author,
  });
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

const saveEvent = (info) => {
  form.post('/calendar/event/create', {
    onSuccess: () => {
      form.reset();
      visible.value = false;
    },
    onError: (errors) => {
      console.log(errors);
    }
  })
} 
</script>