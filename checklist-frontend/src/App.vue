<template>
  <div id="app">
    <header>
      <h1>Checklist</h1>
    </header>
    <main>
      <div class="container">
        <div class="calendar-section">
          <Calendar @fecha-seleccionada="obtenerChecklistDiario"></Calendar>
        </div>
      </div>
      <div class="container1">
        <div class="checklist-section">
          <div>
            <h2>Checklist Diario - {{ fechaSeleccionada }}</h2>
            <ChecklistDetail :fecha="fechaSeleccionada"></ChecklistDetail>
          </div>
          <div>
            <ChecklistForm></ChecklistForm>
          </div>
        </div>
      </div>
    </main>
  </div>
</template>

<script>
import Calendar from './components/Calendar.vue';
import ChecklistDetail from './components/ChecklistDetail.vue';
import ChecklistForm from './components/ChecklistForm.vue';

export default {
  name: 'App',
  data() {
    return {
      fechaSeleccionada: null
    };
  },
  methods: {
    obtenerChecklistDiario(fecha) {
      this.fechaSeleccionada = fecha;
    }
  },
  components: {
    Calendar,
    ChecklistDetail,
    ChecklistForm
  }
};
</script>

<style>
#app {
  background: linear-gradient(120deg, #86A8E7, #91EAE4);
  min-height: 100vh;
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
}

header {
  text-align: center;
  margin-bottom: 0px;
}

h1 {
  font-size: 100px;
  color: #fff;
  text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
}
h2 {
  font-size: 30px;
  color: #b00808;
  text-align: center;
  text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
}

.container {
  width: 90vw; /* Cambiado a 90vw */
  max-width: 1200px;
  display: flex;
  justify-content: space-between;
}
</style>

