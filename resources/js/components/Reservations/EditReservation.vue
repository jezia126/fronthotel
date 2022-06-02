<template lang="">
<form @submit.prevent="modifierReservation">
 <div class="form-group">
 <input type="text" class="form-control" placeholder="Numreser" v-model="reservation.numreservation">
  <input type="text" class="form-control" placeholder="datearr" v-model="reservation.datearr">
   <input type="text" class="form-control" placeholder="datedep" v-model="reservation.datedep">
<div class="form-group">
 clients<select class="form-control" v-model="reservation.clientID">
 <option :value=reservation.clientID></option>
 <option v-for="sc in Clients" :key="sc.id"
:value=sc.id>{{sc.npr}}</option>
 </select>
 </div>
<div class="form-group">
 chambre<select class="form-control" v-model="reservation.chambreID">
 <option :value=reservation.chambreID></option>
 <option v-for="sc in Chambres" :key="sc.id"
:value=sc.id>{{sc.numchambre}}</option>
 </select>
 </div>
 

 </div>

 <button type="submit" class="btn btn-block btn-primary">Modifier client
</button>
</form>
</template>
<script>
import vueFilePond from 'vue-filepond';
import 'filepond/dist/filepond.min.css';
import FilePondPluginImagePreview from 'filepond-plugin-image-preview';
import 'filepond-plugin-image-preview/dist/filepond-plugin-image-preview.min.css';
export default {
    name:'edit',
 components: {
 FilePond: vueFilePond(FilePondPluginImagePreview)
 },
 data() {
 return {
     tab:[],

 reservation:{},
  Clients:[],
 Chambres:[]



 }
 },

 methods: {

 modifierReservation(){
 
 
 this.axios.patch(`http://localhost:8000/api/reservations/${this.$route.params.id}`,this.reservation)
 .then(() => {
 this.$router.push('/reservations')})
 .catch(error => {
 this.errorMessage = error.message;
 console.error("There was an error!", error);})
 }, 
  getClients(){
 this.axios.get('http://localhost:8000/api/clients').then(res => {
 this.Clients = res.data;
 }).catch(error => {
 console.log(error)
 });
 }, 
getChambres(){
 
 this.axios.get('http://localhost:8000/api/chambres').then(res =>
{
 this.Chambres = res.data;
 }).catch(error => {
 console.log(error)
 });
 },

 

 getOneReservation(){
 this.axios
 .get(`http://localhost:8000/api/reservations/${this.$route.params.id}`)
 .then((res) => {
 this.reservation = res.data;
 });
 }

 },
 created() {
 this.getOneReservation() ;
 this.getClients();
 this.getChambres();
 }, 

 
}
</script>
<style lang="">

</style>