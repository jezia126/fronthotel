import { createRouter,createWebHashHistory } from 'vue-router'
import Home from "./Home";
import AllChambres from "./components/Chambres/AllChambres";
import AddChambre from "./components/Chambres/AddChambre";
import EditChambre from "./components/Chambres/EditChambre"; 
import AllClients from "./components/Clients/AllClients";
import AddClient from "./components/Clients/AddClient";
import EditClient from "./components/Clients/EditClient"; 
import AllReservations from "./components/Reservations/AllReservations";
import AddReservation from "./components/Reservations/AddReservation";
import EditReservation from "./components/Reservations/EditReservation";
import Register from './components/Authentification/Register.vue';
import Login from './components/Authentification/Login.vue';
import Profile from './components/Authentification/Profile.vue'; 
import Logout from './components/Authentification/Logout.vue'; 
const routes = [
 {
 path: '/',
 name: 'home',
 component: Home
 },
 {
 path: '/chambres',
 name: 'chambres',
 component: AllChambres
 } ,
 {
    path: '/AddChambre',
    name: 'AddChambre',
    component: AddChambre
    } ,
    {
        path: '/editChambre',
        name: 'editChambre',
        component: EditChambre
        },
        {
            path: '/clients',
            name: 'clients',
            component: AllClients
            },
            {
                path: '/AddClient',
                name: 'AddClient',
                component:AddClient
                },
                {
                    path: '/editClients',
                    name: 'editClients',
                    component: EditClient
                    },{
                        path: '/reservations',
                        name: 'reservations',
                        component: AllReservations
                        } , {
                            path: '/AddReservation',
                            name: 'AddReservation',
                            component:AddReservation
                            },
                            {
                                path: '/editReservations',
                                name: 'editReservations',
                                component: EditReservation
                                },
                                {
                                    name: 'register',
                                    path: '/register',
                                    component: Register
                                    },
                                    {
                                    name: 'login',
                                    path: '/login',
                                    component: Login
                                    },
                                    {
                                        name: 'logout',
                                        path: '/logout',
                                        component: Logout
                                        }, 
                                       
                                    {
                                    name: 'profile',
                                    path: '/profile',
                                    component: Profile },

 ];
const router = createRouter({
 history: createWebHashHistory(),
 routes
 })

export default router 
