import EmployeeIndex from './components/employees/Index.vue';
import EmployeeCreate from './components/employees/Create.vue';
import EmployeeEdit from './components/employees/Edit.vue';

export const routes = [
    {
        path: '/employees',
        name: 'EmployeesIndex',
        component: EmployeeIndex
    },
    {
        path: '/employees/create',
        name: 'EmployeesCreate',
        component: EmployeeCreate
    },
    {
        path: '/employees/:id',
        name: 'EmployeesEdit',
        component: EmployeeEdit
    }
];