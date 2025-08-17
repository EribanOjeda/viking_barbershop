import './bootstrap';
import { createApp } from 'vue';

const app = createApp({});

app.component('reservas-widget', {
  template: `<div>
      <h3 class="h6 mb-2">Reserva rápida</h3>
      <form @submit.prevent="crear">
        <div class="row g-2">
          <div class="col"><input v-model="fecha" type="date" class="form-control" required></div>
          <div class="col"><input v-model="hora" type="time" class="form-control" required></div>
          <div class="col"><input v-model="servicio" class="form-control" placeholder="Servicio" required></div>
          <div class="col"><button class="btn btn-primary">Reservar</button></div>
        </div>
        <p v-if="msg" class="text-success mt-2">{{ msg }}</p>
      </form>
    </div>`,
  data(){return{fecha:'',hora:'',servicio:'', msg:''}},
  methods:{
    async crear(){
      // Demo: asume cliente_id = 1; en producción, usa el cliente real del usuario
      const r = await fetch('/api/reservas', {
        method:'POST',
        headers:{'Content-Type':'application/json','X-Requested-With':'XMLHttpRequest'},
        body: JSON.stringify({cliente_id:1, fecha:this.fecha, hora:this.hora, servicio:this.servicio})
      });
      if(r.ok){ this.msg = 'Reserva creada'; this.fecha=this.hora=this.servicio=''; }
    }
  }
});

app.mount('#app');
