import Owners from './components/Owners.vue';
import Addresses from './components/Addresses.vue';
import Cars from './components/Cars.vue';
import OwnerProfile from './components/OwnerProfile.vue';
import CarProfile from './components/CarProfile.vue';
import AddressProfile from './components/AddressProfile.vue';
import OwnerProfileEdit from './components/OwnerProfileEdit.vue';
import AddressProfileEdit from './components/AddressProfileEdit.vue';
import CarProfileEdit from './components/CarProfileEdit.vue';

export const routes = [
    {
        name: 'owners',
        path: '/owners',
        component: Owners
    },
    {
        name: 'addresses',
        path: '/addresses',
        component: Addresses
    },
    {
        name: 'cars',
        path: '/cars',
        component: Cars
    },
    {
        name: 'ownerProfile',
        path: '/owner/:id',
        component: OwnerProfile
    },
    {
        name: 'carProfile',
        path: '/car/:id',
        component: CarProfile
    },
    {
        name: 'addressProfile',
        path: '/address/:id',
        component: AddressProfile
    },
    {
        name: 'ownerProfileEdit',
        path: '/owner/edit/:id',
        component: OwnerProfileEdit
    },
    {
        name: 'addressProfileEdit',
        path: '/address/edit/:id',
        component: AddressProfileEdit
    },
    {
        name: 'carProfileEdit',
        path: '/car/edit/:id',
        component: CarProfileEdit
    }
];
