<template>
 <!-- Nav bar -->
 <nav class="navbar navbar-dark bg-primary justify-content-between flex-nowrap
flex-row">
 <div class="container">
     <a class="navbar-brand float-left">
 <router-link class="nav-link navbar-brand pr-3" to="/register">
 Authentification
 </router-link>
 </a>
 <a class="navbar-brand float-left">Projet</a>
 <ul class="nav navbar-nav flex-row float-right">
 <li class="nav-item">
 <router-link class="nav-link navbar-brand
 pr-3" to="/"> Home </router-link>
 </li>
 <li class="nav-item">
<router-link class="nav-link pr-3" to="/chambres"> Chambres </router-link>
</li>

 <li class="nav-item">
 <router-link class="nav-link navbar-brand pr-3"
to="/clients"> clients </router-link>
 </li>
 <li class="nav-item">
 <router-link class="nav-link navbar-brand pr-3"
to="/reservations"> reservations </router-link>
 </li>
 <a class="navbar-brand float-left">
 <router-link class="nav-link" to="/logout"> Logout </router-link>
 </a>
 </ul>
 </div>
 </nav>
</template>

<script>
 export default {}
</script>