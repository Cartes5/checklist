<!-- ChecklistDetail.vue -->
<template>
  <div>
    <h2>Checklist del {{ fecha }}</h2>
    <ul>
      <li v-for="item in checklistItems" :key="item.id">
        <ChecklistItem :item="item" @completado-cambiado="actualizarEstadoCompleto"></ChecklistItem>
      </li>
    </ul>
  </div>
</template>

<script>
import ChecklistItem from './ChecklistItem.vue';
import axios from 'axios';

export default {
  components: {
    ChecklistItem
  },
  props: {
    fecha: {
      type: String,
      required: true
    }
  },
  data() {
    return {
      checklistItems: []
    };
  },
  mounted() {
    this.obtenerChecklistItems();
  },
  methods: {
    obtenerChecklistItems() {
      // Realizar una petición HTTP para obtener los elementos del checklist para la fecha especificada
      axios.get(`/checklists?fecha=${this.fecha}`)
        .then(response => {
          this.checklistItems = response.data;
        })
        .catch(error => {
          console.error('Error al obtener el checklist:', error);
        });
    },
    actualizarEstadoCompleto(item, completado) {
      // Actualizar el estado completado del elemento en la lista
      const index = this.checklistItems.findIndex(i => i.id === item.id);
      if (index !== -1) {
        this.checklistItems[index].completado = completado;
      }
    }
  }
};
</script>

<style scoped>
/* Estilos para el contenedor del checklist */
div {
  background-color: #f9f9f9;
  padding: 20px;
  border-radius: 8px;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

/* Estilos para el título del checklist */
h2 {
  font-size: 24px;
  margin-bottom: 20px;
}

/* Estilos para la lista de elementos del checklist */
ul {
  list-style-type: none;
  padding: 0;
}

/* Estilos para cada elemento del checklist */
li {
  margin-bottom: 10px;
}

/* Estilos para los elementos completados */
.completado {
  text-decoration: line-through;
  color: #888;
}

</style>
