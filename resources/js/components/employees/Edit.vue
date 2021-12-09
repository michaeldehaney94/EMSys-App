<template>
  <div>
      <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Update Employee
                        <router-link :to="{name: 'EmployeesIndex'}" class="float-right">Back</router-link>
                    </div>
    
                    <div class="card-body">

                        <form @submit.prevent="updateEmployee">

                            <!-- First Name -->
                            <div class="form-group row">
                                <label for="first_name" class="col-md-4 col-form-label text-md-right"> First Name</label>
    
                                <div class="col-md-6">
                                    <input v-model="form.first_name" id="first_name" type="text" class="form-control" name="first_name"  required>
    
                                </div>
                            </div>

                            <!-- Middle Name -->
                            <div class="form-group row">
                                <label for="middle_name" class="col-md-4 col-form-label text-md-right">Middle Name</label>
    
                                <div class="col-md-6">
                                    <input v-model="form.middle_name" id="middle_name" type="text" class="form-control" name="middle_name"  required>
    
                                </div>
                            </div>

                            <!-- Last Name -->
                            <div class="form-group row">
                                <label for="last_name" class="col-md-4 col-form-label text-md-right"> Last Name</label>
    
                                <div class="col-md-6">
                                    <input v-model="form.last_name" id="last_name" type="text" class="form-control" name="last_name"  required>
    
                                </div>
                            </div>

                            <!-- Address -->
                            <div class="form-group row">
                                <label for="address" class="col-md-4 col-form-label text-md-right">Address</label>
    
                                <div class="col-md-6">
                                    <input v-model="form.address" id="address" type="text" class="form-control" name="address" required>
    
                                </div>
                            </div>

                            <!-- Select Country -->
                            <div class="form-group row">
                                <label for="country" class="col-md-4 col-form-label text-md-right">Country</label>
    
                                <div class="col-md-6">
                                    <select 
                                        v-model="form.country_id"
                                        @change="getStates()"
                                        name="country" class="form-control" aria-label="Default select example">
                                        <option 
                                            v-for="country in countries" :key="country.id" :value="country.id">
                                            {{ country.name }}
                                        </option>
                                    </select>
                                </div>
                            </div>

                            <!-- Select State -->
                            <div class="form-group row">
                                <label for="state" class="col-md-4 col-form-label text-md-right">State/Region</label>
    
                                <div class="col-md-6">
                                    <select 
                                         v-model="form.state_id"
                                        @change="getCities()"
                                        name="state" class="form-control" aria-label="Default select example">
                                        <option 
                                            v-for="state in states" :key="state.id" :value="state.id">
                                            {{ state.name }}
                                        </option>
                                    </select>
                                </div>
                            </div>

                            <!-- Select Department -->
                            <div class="form-group row">
                                <label for="department" class="col-md-4 col-form-label text-md-right">Department</label>
    
                                <div class="col-md-6">
                                    <select 
                                        v-model="form.department_id"
                                        name="department" class="form-control" aria-label="Default select example">
                                        <option
                                            v-for="department in departments" :key="department.id" :value="department.id">
                                            {{ department.name }}
                                        </option>
                                    </select>
                                </div>
                            </div>

                            <!-- Select City/Town -->
                            <div class="form-group row">
                                <label for="city" class="col-md-4 col-form-label text-md-right">City/Town</label>
    
                                <div class="col-md-6">
                                    <select 
                                        v-model="form.city_id"
                                        name="city" class="form-control" aria-label="Default select example">
                                        <option 
                                             v-for="city in cities" :key="city.id" :value="city.id">
                                            {{ city.name }}
                                        </option>
                                    </select>
                                </div>
                            </div>

                            <!-- Zip Code -->
                            <div class="form-group row">
                                <label for="zip_code" class="col-md-4 col-form-label text-md-right">Zip Code</label>
    
                                <div class="col-md-6">
                                    <input v-model="form.zip_code" id="zip_code" type="text" class="form-control" name="zip_code" required>
    
                                </div>
                            </div>

                            <!-- DOB -->
                            <div class="form-group row">
                                <label for="zip_code" class="col-md-4 col-form-label text-md-right">Birth Date</label>
    
                                <div class="col-md-6">
                                    <datepicker 
                                        v-model="form.birthdate"
                                        input-class="form-control">

                                    </datepicker>
                                </div>
                            </div>
                            
                            <!-- Date Hired -->
                            <div class="form-group row">
                                <label for="date_hired" class="col-md-4 col-form-label text-md-right">Date Hired</label>
    
                                <div class="col-md-6">
                                    <datepicker 
                                        v-model="form.date_hired"
                                        input-class="form-control">

                                    </datepicker>
                                </div>
                            </div>

                            <div class="form-group row mb-4">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Update
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </div>
</template>

<script>
import Datepicker from 'vuejs-datepicker';
import moment from 'moment';
export default {
    components: {
        Datepicker
    },
    data() {
         return {
            countries: [],
            states: [],
            departments: [],
            cities: [],
            form: {
                first_name: "",
                last_name: "",
                middle_name: "",
                address: "",
                country_id: "",
                state_id: "",
                department_id: "",
                city_id: "",
                zip_code: "",
                birthdate: null,
                date_hired: null
            }
        }
    },
    created(){
        this.getCountries();
        this.getDepartments();
        this.getEmployee();
    },
    methods: {
        getEmployee() {
          axios.get("/api/employees/"+ this.$route.params.id)
            .then(response => {
                this.form = response.data.data;
                this.getStates();
                this.getCities();

            }).catch(error => {
                console.error(error.messsage);
            })
        },
        getCountries(){
            axios.get("/api/employees/countries")
            .then(response => {
                this.countries = response.data;
            }).catch(error => {
                console.error(error.messsage);
            })
        },
        getStates() {
            axios.get("/api/employees/" + this.form.country_id + "/states")
                .then(res => {
                    this.states = res.data;
                })
                .catch(err => {
                    console.error(err.messsage);
                });
        },
        getCities() {
            axios.get("/api/employees/" + this.form.state_id + "/cities")
                .then(res => {
                    this.cities = res.data;
                })
                .catch(err => {
                    console.error(err.messsage);
                });
        },
        getDepartments() {
            axios.get("/api/employees/departments")
                .then(res => {
                    this.departments = res.data;
                })
                .catch(err => {
                    console.error(err.messsage);
                });
        },
        updateEmployee() {
            axios.put("/api/employees" + this.$route.params.id, {
                'first_name': this.form.first_name,
                'middle_name': this.form.middle_name,
                'last_name': this.form.last_name,
                'address': this.form.address,
                'country_id': this.form.country_id,
                'state_id': this.form.state_id,
                'city_id': this.form.city_id,
                'department_id': this.form.department_id,
                'zip_code': this.form.zip_code,
                'birthdate': this.format_date(this.form.birthdate),
                'date_hired': this.format_date( this.form.date_hired)
            })
            .then( res => {
                //this redirects route to the index page showing all employees
                this.$router.push({name: 'EmployeIndex'});
                // console.log(res);
            });
        },
        format_date(value){
            if (value) {
                return moment(String(value)).format("YYYYMMDD");
            }
        }
    }
}
</script>

<style>

</style>