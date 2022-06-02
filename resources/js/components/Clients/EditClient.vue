<template lang="">
<form @submit.prevent="modifierClient">
 <div class="form-group">
 <input type="text" class="form-control" placeholder="Npr" v-model="Client.npr">
  <input type="text" class="form-control" placeholder="adresse" v-model="Client.adresse">
   <input type="text" class="form-control" placeholder="email" v-model="Client.email">


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
 components: {
 FilePond: vueFilePond(FilePondPluginImagePreview)
 },
 data() {
 return {
 Client:[]

 }
 },mounted (){
 this.getOneClient() ;
 },

 methods: {

 modifierClient(){
 const clt = {
 npr:this.Client.npr,
 adresse:this.Client.adresse,
 email:this.Client.email
 }
 this.axios.put(`http://localhost:8000/api/clients/${this.$route.params.id}`,clt)
 .then(() => {
 this.$router.push('/clients')})
 .catch(error => {
 this.errorMessage = error.message;
 console.error("There was an error!", error);})
 }, 

 

 getOneClient(){
 this.axios
 .get(`http://localhost:8000/api/clients/${this.$route.params.id}`)
 .then((res) => {
 this.Client = res.data;
 });
 }

 }
 
}
</script>
<style lang="">

</style>