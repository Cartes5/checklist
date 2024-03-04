<template>
  <div class="calendar">
    <div class="header">
      <button @click="cambiarMes(-1)">&lt;</button>
      <h2>{{ nombreMes }} {{ currentYear }}</h2>
      <button @click="cambiarMes(1)">&gt;</button>
    </div>
    <div class="days">
      <div v-for="(week, index) in weeks" :key="index" class="week">
        <div v-for="(day, index) in week" :key="index" class="day" @click="seleccionarFecha(day)">
          {{ day }}
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: 'DailyCalendar',
  data() {
    return {
      currentMonth: new Date().getMonth(),
      currentYear: new Date().getFullYear(),
      weeks: []
    };
  },
  mounted() {
    this.generarCalendario();
  },
  methods: {
    generarCalendario() {
      const firstDayOfMonth = new Date(this.currentYear, this.currentMonth, 1).getDay();
      const daysInMonth = new Date(this.currentYear, this.currentMonth + 1, 0).getDate();

      let dayCounter = 1;
      const calendar = [];

      for (let i = 0; i < 6; i++) {
        const week = [];
        for (let j = 0; j < 7; j++) {
          if ((i === 0 && j < firstDayOfMonth) || dayCounter > daysInMonth) {
            week.push('');
          } else {
            week.push(dayCounter);
            dayCounter++;
          }
        }
        calendar.push(week);
        if (dayCounter > daysInMonth) break;
      }

      this.weeks = calendar;
    },
    cambiarMes(step) {
      this.currentMonth += step;
      if (this.currentMonth < 0) {
        this.currentMonth = 11;
        this.currentYear--;
      } else if (this.currentMonth > 11) {
        this.currentMonth = 0;
        this.currentYear++;
      }
      this.generarCalendario();
    },
    seleccionarFecha(day) {
      // Emitir evento para informar al componente padre de la fecha seleccionada
      this.$emit('fecha-seleccionada', `${day}/${this.currentMonth + 1}/${this.currentYear}`);
    }
  },
  computed: {
    nombreMes() {
      const nombresMeses = ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'];
      return nombresMeses[this.currentMonth];
    },
  }
};
</script>

<style scoped>
.calendar {
  width: auto;
  background-color: #f8f8f8;
  border-radius: 10px;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

.header {
  display: flex;
  justify-content: space-between;
  align-items: center;
  padding: 10px;
}

.days {
  display: grid;
  grid-template-columns: repeat(7, 1fr);
  border-top: 1px solid #ddd;
}

.week {
  display: flex;
}

.day {
  flex: 1;
  padding: 10px;
  text-align: center;
  border-right: 1px solid #ddd;
  border-bottom: 1px solid #ddd;
  cursor: pointer;
}

.day:hover {
  background-color: #f0f0f0;
}

.day.empty {
  visibility: hidden;
}
</style>

