<!-- ChecklistItem.vue -->
<template>
  <div>
    <input type="checkbox" v-model="completado" @change="toggleCompleto">
    <span :class="{ 'completado': completado }">{{ item.descripcion }}</span>
  </div>
</template>

<script>
export default {
  props: {
    item: {
      type: Object,
      required: true
    }
  },
  data() {
    return {
      completado: false
    };
  },
  mounted() {
    this.completado = this.item.completado || false;
  },
  methods: {
    toggleCompleto() {
      // Emitir evento para informar al componente padre que el estado de completado ha cambiado
      this.$emit('completado-cambiado', this.item, this.completado);
    }
  }
};
</script>

<style scoped>
/* Estilos para el contenedor del elemento del checklist */
div {
  display: flex;
  align-items: center;
}

/* Estilos para el checkbox */
input[type="checkbox"] {
  margin-right: 10px;
}

/* Estilos para el texto del elemento del checklist */
span {
  font-size: 16px;
  color: #333;
}

/* Estilos para el texto del elemento completado */
.completado {
  text-decoration: line-through;
  color: #888;
}

</style>
