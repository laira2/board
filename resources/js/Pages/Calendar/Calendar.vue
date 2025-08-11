<template>
      <div>
            <FullCalendar :options="calendarOptions" class="milcho-custom-calendar" />
      </div>
  
</template>

<script setup>
import FullCalendar from '@fullcalendar/vue3';
import dayGridPlugin from '@fullcalendar/daygrid';
import timeGridPlugin from '@fullcalendar/timegrid'
import interactionPlugin from '@fullcalendar/interaction'

const calendarOptions = {
      plugins: [dayGridPlugin, interactionPlugin, timeGridPlugin],
      initialView: 'dayGridMonth',
      headerToolbar:{
            left: 'prev,next today',
            center: 'title',
            right: 'dayGridMonth,timeGridWeek,timeGridDay'
      },
      views: {
        dayGridMonth: {
          buttonText: '월별'
        },
        timeGridWeek: { 
          buttonText: '주별'
        },
        timeGridDay: { 
          buttonText: '일별'
        }
      },
      events: [
      { title: '회의', date: '2025-08-08' },
      { title: '마감일', date: '2025-08-10' }
      ]
};
</script>
