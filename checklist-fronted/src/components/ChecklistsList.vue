<!-- ChecklistList.vue -->
<template>
  <div>
    <h2>Lista de Checklists</h2>
    <ul>
      <li v-for="checklist in checklists" :key="checklist.id">
        {{ checklist.nombre }}
        <button @click="eliminarChecklist(checklist.id)">Eliminar</button>
      </li>
    </ul>
  </div>
</template>

<script>
import axios from 'axios';

export default {
  data() {
    return {
      checklists: []
    };
  },
  mounted() {
    this.obtenerChecklists();
  },
  methods: {
    obtenerChecklists() {
      axios.get('/checklists')
        .then(response => {
          this.checklists = response.data;
        })
        .catch(error => {
          console.error('Error al obtener checklists:', error);
        });
    },
    eliminarChecklist(id) {
      axios.delete(`/checklists/${id}`)
        .then(() => {
          // Eliminar el checklist de la lista después de eliminarlo en el backend
          this.checklists = this.checklists.filter(checklist => checklist.id !== id);
        })
        .catch(error => {
          console.error('Error al eliminar checklist:', error);
        });
    }
  }
};
</script>

<style scoped>
/* Estilos para el contenedor de la lista de checklists */
div {
  margin-top: 20px;
}

/* Estilos para el título de la lista */
h2 {
  font-size: 20px;
  color: #333;
  margin-bottom: 10px;
}

/* Estilos para los elementos de la lista */
ul {
  list-style: none;
  padding: 0;
}

/* Estilos para cada elemento de la lista */
li {
  margin-bottom: 10px;
}

/* Estilos para el nombre del checklist */
span {
  font-size: 16px;
  color: #333;
  margin-right: 10px;
}

/* Estilos para el botón de eliminar */
button {
  background-color: #dc3545;
  color: #fff;
  border: none;
  padding: 5px 10px;
  cursor: pointer;
}

/* Estilos para el botón de eliminar al pasar el ratón por encima */
button:hover {
  background-color: #c82333;
}

</style>
