<template lang="">

<form @submit.prevent="ajouterClient">
 
<div class="form-group">
 <input type="text" class="form-control" placeholder="npr" v-model="npr">
  <input type="text" class="form-control" placeholder="adresse" v-model="adresse">
    <input type="text" class="form-control" placeholder="email" v-model="email">




  </div>
 

 <button type="submit" class="btn btn-block btn-primary">Ajouter Clients
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
 npr: "",
  adresse:"",
 email: "",


 }
 },
 methods: {

 ajouterClient(){
 const clt = {
 npr:this.npr,
 adresse:this.adresse,
 email:this.email
 }
 this.axios.post("http://localhost:8000/api/clients",clt)
 .then(() => {
 this.$router.push('/clients')})
 .catch(error => {
 this.errorMessage = error.message;
 console.error("There was an error!", error);})
 }
 
 }

}
</script>
<style lang="">

</style> 