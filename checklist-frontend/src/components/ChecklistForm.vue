<template>
  <form @submit.prevent="agregarPunto">
    <input type="text" v-model="nuevoPunto" placeholder="Nuevo punto del checklist">
    <button type="submit">Agregar</button>
  </form>
</template>

<script>
import axios from 'axios';

export default {
  data() {
    return {
      nuevoPunto: '',
      error: '' // Variable para almacenar el mensaje de error
    };
  },
  methods: {
    agregarPunto() {
      axios.post('/api/checklist-items', {
        descripcion: this.nuevoPunto
      })
      .then(response => {
        // Manejar la respuesta del backend
        this.$emit('punto-agregado', response.data);
        this.nuevoPunto = ''; // Limpiar el campo después de agregar el punto
        this.error = ''; // Limpiar el mensaje de error si se ha resuelto
      })
      .catch(error => {
        console.error('Error al agregar punto:', error);
        if (error.response && error.response.data) {
          this.error = error.response.data.message; // Asigna el mensaje de error del backend
        } else {
          this.error = 'Error al agregar el punto.'; // Mensaje de error genérico
        }
      });
    }
  }
};
</script>


<style scoped>
/* Estilos para el formulario */
form {
  display: flex;
  align-items: center;
}

/* Estilos para el campo de entrada */
input[type="text"] {
  flex: 1;
  padding: 10px;
  border: 1px solid #ccc;
  border-radius: 4px;
  margin-right: 10px;
}

/* Estilos para el botón de enviar */
button[type="submit"] {
  padding: 10px 20px;
  background-color: #4CAF50;
  color: white;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  transition: background-color 0.3s ease;
}

/* Estilos para el botón de enviar al pasar el ratón */
button[type="submit"]:hover {
  background-color: #45a049;
}
</style>

