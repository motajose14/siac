/*VUE INSTANCE*/
let vm = new Vue({
    vuetify,
    el: '#siac-suite-container',
    data: {
      loading: false,
    },

    computed: {
    },

    created () {
    },

    mounted () {
      document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
          themeSystem: 'Materia',
          initialView: 'dayGridMonth',
          headerToolbar: { center: 'dayGridMonth,timeGridWeek,dayGridDay' },
          locale: 'es'
        });
        calendar.render();
      });
    },

    methods: {
      reserve () {
        this.loading = true

        setTimeout(() => (this.loading = false), 2000)
      },
  	}
});