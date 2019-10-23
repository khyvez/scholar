<template>
    <div>
        <div class="row">
            
            <div class="col-md-12">

                   <div class="table-style text-right">
            <div class="form-group row justify-content-end">
                <div class="input-group col-md-4">
                            
                <input class="form-control" type="text" v-model="search" placeholder="Search..."
                        @input="resetPagination()" style="width: 250px;">
                 
                    </div>
          
            </div>
      
           <div class="form-group row justify-content-end">
               <div class="col-md-2">
                <select v-model="length" class="form-control" @change="resetPagination()">
                    <option value="10">10</option>
                    <option value="20">20</option>
                    <option value="30">30</option>
                </select>
               </div>
              
           </div>
                  
               
          
        </div>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th v-for="column in columns" :key="column.name" @click="sortBy(column.name)"
                        :class="sortKey === column.name ? (sortOrders[column.name] > 0 ? 'sorting_asc' : 'sorting_desc') : 'sorting'"
                        style="cursor:pointer;">
                        {{column.label}}
                    </th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="vdata in paginatedData" :key="vdata.id">
                    <td>{{vdata.lastname}}</td>
                    <td>{{vdata.firstname}}</td>
                    <td>{{vdata.middlename}}</td>
                    <td>{{vdata.gender}}</td>
                    <td>{{vdata.contact}}</td>
                    <td><a class="btn btn-link btn-sm" href="#" @click="deleteStudent(vdata.id)"><i class="fa fa-trash" aria-hidden="true"></i> Delete</a>
                    <a class="btn btn-link btn-sm"  href="#" @click="showModal(vdata)"><i class="fa fa-eye" aria-hidden="true"></i> View/Edit</a>
                    </td>
                </tr>
            </tbody>
        </table>
        <div>
            <nav class="pagination pull-right" v-if="!tableShow.showdata">
                <span class="page-stats">{{pagination.from}} - {{pagination.to}} of {{pagination.total}}</span>
                <button v-if="pagination.prevPageUrl" class="ml-3 px-3 btn btn-sm btn-primary pagination-previous" @click="--pagination.currentPage">
                    Prev
                </button>
                <button class="ml-3 px-3 btn btn-sm btn-primary pagination-previous" v-else disabled>
                Prev
                </button>
                <button v-if="pagination.nextPageUrl" class="ml-3 px-3 btn btn-sm pagination-next" @click="++pagination.currentPage">
                    Next
                </button>
                <button class="ml-3 px-3 btn btn-sm btn-primary pagination-next" v-else disabled>
                    Next
                </button>
            </nav>
            <nav class="pagination" v-else>
                <span class="page-stats">
                    {{pagination.from}} - {{pagination.to}} of {{filteredUsers.length}}
                    <span v-if="`filteredUsers.length < pagination.total`"></span>
                </span>
                <button v-if="pagination.prevPage" class="ml-3 px-3 text-white  btn btn-sm btn-primary pagination-previous" @click="--pagination.currentPage">
                    Prev
                </button>
                <button class="ml-3 px-3 btn btn-sm pagination-previous btn-primary" v-else disabled>
                Prev
                </button>
                <button v-if="pagination.nextPage" class="ml-3 px-3 btn btn-sm btn-primary pagination-next" @click="++pagination.currentPage">
                    Next
                </button>
                <button class=" ml-3 px-3 btn btn-sm pagination-next btn-primary"  v-else disabled>
                    Next
                </button>
            </nav>
        </div>

            </div>
        </div>



  <b-modal ref="my-modal" size="lg" hide-footer title="Student Information">
       <nav>
            <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-tab1" role="tab" aria-controls="nav-home" aria-selected="true"><i class="fa fa-user text-primary " aria-hidden="true"></i> Student</a>
                <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-tab2" role="tab" aria-controls="nav-profile" aria-selected="false">Relative</a>
                <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-tab3" role="tab" aria-controls="nav-contact" aria-selected="false">Address</a>
                <a class="nav-item nav-link" id="nav-about-tab" data-toggle="tab" href="#nav-tab4" role="tab" aria-controls="nav-about" aria-selected="false">Education</a>
            </div>
        </nav>
        <div class="tab-content py-0 px-3 px-sm-0" id="nav-tabContent">
            <div class="p-3 mt-4 tab-pane fade show active" id="nav-tab1" role="tabpanel" aria-labelledby="nav-home-tab">
            <form @submit.prevent="updateStudent" @keydown="form.onKeydown($event)">
                        
            <input type="hidden" v-model="form.id" name="id">

            <div class="form-group row">
                    <div class="col-md-4">
                        <label for="First Name">Last Name</label>
                        <input type="text" v-model="form.lastname" name="lastname" id="" class="form-control" placeholder="last name" aria-describedby="helpId">                  
                    </div>
                    <div class="col-md-4">
                        <label for="First Name">First Name</label>
                        <input type="text" v-model="form.firstname" name="firstname" id="" class="form-control" placeholder="first name" aria-describedby="helpId">                  
                    </div>
                    <div class="col-md-4">
                        <label for="First Name">Middle Name</label>
                        <input type="text" v-model="form.middlename" name="middlename" id="" class="form-control" placeholder="middle name" aria-describedby="helpId">                  
                    </div>
            </div>
            <div class="form-group">
                    <label for="Middle Name">Date of Birth</label>
                    <input type="date" v-model="form.birthdate" name="birthdate" id="" class="form-control" placeholder="" aria-describedby="helpId">
                </div>
                <div class="form-group">
                        <label for="First Name">Gender</label>
                        <select name="gender" v-model="form.gender" id="" class="form-control">
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
    
                    </div>
             
                <div class="form-group">
                    <label for="First Name">Place of Birth</label>
                    <input type="text" v-model="form.birthplace" name="birthplace" id="" class="form-control" placeholder="" aria-describedby="helpId">
                </div>
                <div class="form-group">
                        <label for="First Name">Contact</label>
                        <input type="text" v-model="form.contact" name="contact" id="contact" class="form-control" placeholder="" aria-describedby="helpId">
                    </div>
                <div class="form-group">
                    <label for="First Name">Email Address</label>
                    <input type="email" v-model="form.email" name="email" id="" class="form-control" placeholder="" aria-describedby="helpId">
                </div>
                
                <div class="form-group row text-right">
                    <div class="col text-right">
                        <button :disabled="form.busy" type="submit" class="btn btn-primary">Update</button>
                       
                    </div>
                </div>
            
      </form>

            </div>
            <div class="tab-pane p-3 mt-4 fade" id="nav-tab2" role="tabpanel" aria-labelledby="nav-profile-tab">
            <form @submit.prevent="updateStudent" @keydown="frmRelative1.onKeydown($event)">
              
                <div class="row px-2">
                    <div class="text-muted">Father</div>
                </div>
                <div class="form-group row">
                    <div class="col-md-4">
                        <label for="First Name">Last Name</label>
                        <input type="text" v-model="frmRelative1.lastname" name="flastname" id="" class="form-control" placeholder="last name" aria-describedby="helpId">                  
                    </div>
                    <div class="col-md-4">
                        <label for="First Name">First Name</label>
                        <input type="text" v-model="frmRelative1.firstname" name="ffirstname" id="" class="form-control" placeholder="first name" aria-describedby="helpId">                  
                    </div>
                    <div class="col-md-4">
                        <label for="First Name">Middle Name</label>
                        <input type="text" v-model="frmRelative1.middlename" name="fmiddlename" id="" class="form-control" placeholder="middle name" aria-describedby="helpId">                  
                    </div>
                </div>
                <div class="row px-2">
                    <div class="text-muted">Mother</div>
                </div>
                <div class="form-group row">
                    <div class="col-md-4">
                        <label for="First Name">Last Name</label>
                        <input type="text" v-model="frmRelative2.lastname" name="mlastname" id="" class="form-control" placeholder="last name" aria-describedby="helpId">                  
                    </div>
                    <div class="col-md-4">
                        <label for="First Name">First Name</label>
                        <input type="text" v-model="frmRelative2.firstname" name="mfirstname" id="" class="form-control" placeholder="first name" aria-describedby="helpId">                  
                    </div>
                    <div class="col-md-4">
                        <label for="First Name">Middle Name</label>
                        <input type="text" v-model="frmRelative2.middlename" name="mmiddlename" id="" class="form-control" placeholder="middle name" aria-describedby="helpId">                  
                    </div>
                </div>
            </form>
            </div>
            <div class="tab-pane fade p-3 mt-4" id="nav-tab3" role="tabpanel" aria-labelledby="nav-contact-tab">
                <div class="form-group">
                    <label for="Middle Name">House #</label>
                    <input type="text" v-model="frmAddress.houseno" name="houseno" id="" class="form-control" placeholder="" aria-describedby="helpId">
                </div>
               
             
                <div class="form-group">
                    <label for="First Name">Street</label>
                    <input type="text" v-model="frmAddress.street" name="street" id="" class="form-control" placeholder="" aria-describedby="helpId">
                </div>
                <div class="form-group row">
                    <div class="col-md-6">
                        <label for="First Name">Barangay</label>
                      
                          <select class="form-control" v-model="frmAddress.barangay" name="barangay" id="barangay">
                            
                          </select>
                    
                    </div>
                    <div class="col-md-6">
                        <label for="First Name">Municipality</label>
                        <input type="text" v-model="frmAddress.municipality" name="municipality" id="" class="form-control" placeholder="" aria-describedby="helpId">
                    </div>
                </div>
                <div class="form-group row">
                        <div class="col-md-6">
                            <label for="First Name">Province</label>
                      
                            <select class="form-control" v-model="frmAddress.province" name="province" id="province">
                               
                              </select>
                            
                        </div>
                        <div class="col-md-6">
                            <label for="First Name">Zip Code</label>
                            <input type="text" v-model="frmAddress.zipcode" name="zipcode" id="" class="form-control" placeholder="" aria-describedby="helpId">
                        </div>
                    <input type="hidden" name="student_id" id=""  class="form-control" placeholder="" aria-describedby="helpId">
                       
                </div>
            
            </div>
            <div class="tab-pane fade p-3 mt-4" id="nav-tab4" role="tabpanel" aria-labelledby="nav-about-tab">
                <table class="table">
                        <thead>
                            <tr>
                                <th>LEVEL</th>
                                <th>NAME OF SCHOOL</th>
                                <th>BASIC EDUCATION</th>
                                <th>PERIOD</th>
                                <th>HIGHEST DEGREE</th>
                                <th>YEAR GRADUATED</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td scope="row">ELEMENTARY</td>
                                <td><input type="text" v-model="frmEduc1.name" name="name1" class="form-control" id=""> </td>
                                <td><input type="text" v-model="frmEduc1.course" name="course1" class="form-control" id=""> </td>
                                <td>
                                  <div class="d-flex">
                                      <div class="flex-item">
                                        <select class="form-control yeardrop" v-model="frmEduc1.period_from" name="period_from1" id="">
                                            <option></option>
                                            
                                          </select>
                                      
                                      </div>
                                      <div class="flex-item">
                                        <select class="form-control yeardrop" v-model="frmEduc1.period_to" name="period_to1" id="">
                                            <option></option>
                                         
                                          </select>
                                      
                                    </div>
                                  </div>
                                  
                                </td>
                                <td><input type="text" v-model="frmEduc1.degree" name="degree1" class="form-control" id=""> </td>
                                <td> <select class="form-control yeardrop" v-model="frmEduc1.graduate" name="graduate1" id="">
                                    <option></option>
                                  </select>
                              </td>
                            </tr>
                            <tr>
                                <td scope="row">HIGH SCHOOL</td>
                                <td><input type="text" name="name2" v-model="frmEduc2.name" class="form-control" id=""> </td>
                                <td><input type="text" name="course2" v-model="frmEduc2.course" class="form-control" id=""> </td>
                                <td>
                                  <div class="d-flex">
                                      <div class="flex-item">
                                        <select class="form-control yeardrop" v-model="frmEduc2.period_from" name="period_from2" id="">
                                            <option></option>
                                            
                                          </select>
                                      
                                      </div>
                                      <div class="flex-item">
                                        <select class="form-control yeardrop" v-model="frmEduc2.period_to" name="period_to2" id="">
                                            <option></option>
                                         
                                          </select>
                                      
                                    </div>
                                  </div>
                                  
                                </td>
                                <td><input type="text" name="degree2" v-model="frmEduc2.degree" class="form-control" id=""> </td>
                                <td> <select class="form-control yeardrop" v-model="frmEduc2.graduate" name="graduate2" id="">
                                    <option></option>
                                  </select>
                              </td>
                            </tr>
                            <tr>
                                <td scope="row">COLLEGE</td>
                                <td><input type="text" name="name3" v-model="frmEduc3.name" class="form-control" id=""> </td>
                                <td><input type="text" name="course3" v-model="frmEduc3.course" class="form-control" id=""> </td>
                                <td>
                                  <div class="d-flex">
                                      <div class="flex-item">
                                        <select class="form-control yeardrop" v-model="frmEduc3.period_from" name="period_from3" id="">
                                            <option></option>
                                            
                                          </select>
                                      
                                      </div>
                                      <div class="flex-item">
                                        <select class="form-control yeardrop" v-model="frmEduc3.period_to" name="period_to3" id="">
                                            <option></option>
                                         
                                          </select>
                                      
                                    </div>
                                  </div>
                                  
                                </td>
                                <td><input type="text" name="degree3" v-model="frmEduc3.degree" class="form-control" id=""> </td>
                                <td> <select class="form-control yeardrop" v-model="frmEduc3.graduate" name="graduate3" id="">
                                    <option></option>
                                  </select>
                              </td>
                            </tr>
                        </tbody>
                    </table>

            </div>
        </div>
    

      </b-modal>
    </div>
</template>
<script>
import VueSweetalert2 from 'vue-sweetalert2';
import { log } from 'util';

import { Form, HasError, AlertError } from 'vform'

//window.form = Form;

Vue.component(HasError.name, HasError)
Vue.component(AlertError.name, AlertError)

export default {
    created() {
        this.getData();
           Fire.$on('reloadUsers', () => {
            this.getData();
        })
    },

    data() {
        
        let sortOrders = {};
        let columns = [
            {label: 'Last Name', name: 'lastname' },
            {label: 'First Name', name: 'firstname'},
            {label: 'Middle Name', name: 'middlename'},
            {label: 'Gender', name: 'gender'},
            {label: 'Contact', name: 'contact'},
            
        
        ];
        columns.forEach((column) => {
           sortOrders[column.name] = -1;
        });
        
        return {
           
            vardata: [],
            form: '',
            columns: columns,
            sortKey: 'lastname',
            sortOrders: sortOrders,
            length: 10,
            search: '',
            tableShow: {
                showdata: true,
            },
            pagination: {
                currentPage: 1,
                total: '',
                nextPage: '',
                prevPage: '',
                from: '',
                to: ''
            },
            form: new Form({
                id: '',
                lastname: '',
                firstname: '',
                middlename: '',
                birthdate: '',
                gender: '',
                birthplace: '',
                contact: '',
                email: '',
            }),
            frmRelative1: new Form({
                id: '',
                student_id: '',
                type: '',
                firstname: '',
                middlename: '',
                lastname: '',

            }),
            frmRelative2: new Form({
                id: '',
                student_id: '',
                type: '',
                firstname: '',
                middlename: '',
                lastname: '',

            }),
            frmAddress: new Form({
                id: '',
                houseno: '',
                street: '',
                barangay: '',
                municipality: '',
                province: '',
                zipcode: '',              
            }),
            frmEduc1: new Form({
                id: '',
                name: '',
                course: '',
                period_from: '',
                period_to: '',
                degree: '',
                graduate: '',        
            }),
            frmEduc2: new Form({
                id: '',
                name: '',
                course: '',
                period_from: '',
                period_to: '',
                degree: '',
                graduate: '',        
            }),
            frmEduc3: new Form({
                id: '',
                name: '',
                course: '',
                period_from: '',
                period_to: '',
                degree: '',
                graduate: '',        
            }),
            
            
        }
    },

    methods: {
       showModal(vdata) {
           axios.get('/rel/' + vdata.id)
                .then(response => {
                    console.log('d: ', response.data[0])
                    
                  //  this.vardata = response.data;
                   // this.pagination.total = this.vardata.length;
                   this.frmRelative1.reset();
                   this.frmRelative1.fill(response.data[0]);
                   this.frmRelative2.reset();
                   this.frmRelative2.fill(response.data[1]);
                   
                   
                })
                .catch(errors => {
                    console.log(errors);
                });
            
            axios.get('/vue/address/' + vdata.id)
                .then(response => {
                    console.log('d: ', response.data[0])
                    this.frmAddress.reset();
                    this.frmAddress.fill(response.data[0]);              
                })
                .catch(errors => {
                    console.log(errors);
                });

            axios.get('/vue/education/' + vdata.id)
                .then(response => {
                    this.frmEduc1.reset();
                    this.frmEduc1.fill(response.data[0]);
                    
                    this.frmEduc2.reset();
                    this.frmEduc2.fill(response.data[1]);
                    
                    this.frmEduc3.reset();
                    this.frmEduc3.fill(response.data[2]);              
                })
                .catch(errors => {
                    console.log(errors);
                });
                



            this.form.reset();
            this.$refs['my-modal'].show();
            this.form.fill(vdata);
   
      },
       updateStudent () {
           
            this.form.put('/admin/student/' + this.form.id)
            .then(({ data }) => { 
                console.log(data)
               Swal.fire(
                'Updated!',
                'Sucesfully updated!',
                'success'
                )
                this.form.reset();
                this.$refs['my-modal'].hide();
    
                this.getData();

            })
        },
        deleteStudent(id){
                const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: 'btn btn-success',
                    cancelButton: 'btn btn-danger'
                },
                buttonsStyling: false
                })

                swalWithBootstrapButtons.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'No, cancel!',
                reverseButtons: true
                }).then((result) => {
                if (result.value) {
                     axios.delete(`/stud/${id}/delete`).then(()=>{
                         swalWithBootstrapButtons.fire(
                            'Deleted!',
                            'Succesfully deleted.',
                            'success'
                            )       
                       this.getData();
                        })

                   
                } else if (
                    /* Read more about handling dismissals below */
                    result.dismiss === Swal.DismissReason.cancel
                ) {
                    swalWithBootstrapButtons.fire(
                    'Cancelled',
                    'Safe :)',
                    'error'
                    )
                }
                })

        },
        
        getData() {
            axios.get('/getstudent', {params: this.tableShow})
                .then(response => {
                    console.log('The data: ', response.data)
                    
                    this.vardata = response.data;
                    this.pagination.total = this.vardata.length;
                   
                })
                .catch(errors => {
                    console.log(errors);
                });
        },
        paginate(array, length, pageNumber) {
            this.pagination.from = array.length ? ((pageNumber - 1) * length) + 1 : ' ';
            this.pagination.to = pageNumber * length > array.length ? array.length : pageNumber * length;
            this.pagination.prevPage = pageNumber > 1 ? pageNumber : '';
            this.pagination.nextPage = array.length > this.pagination.to ? pageNumber + 1 : '';
            return array.slice((pageNumber - 1) * length, pageNumber * length);
        },
        resetPagination() {
            this.pagination.currentPage = 1;
            this.pagination.prevPage = '';
            this.pagination.nextPage = '';
        },
        sortBy(key) {
            this.resetPagination();
            this.sortKey = key;
            this.sortOrders[key] = this.sortOrders[key] * -1;
        },
        getIndex(array, key, value) {
            return array.findIndex(i => i[key] == value)
        },
    },
    computed: {

        filteredUsers() {
            let vardata = this.vardata;
            if (this.search) {
                vardata = vardata.filter((row) => {
                    return Object.keys(row).some((key) => {
                        return String(row[key]).toLowerCase().indexOf(this.search.toLowerCase()) > -1;
                    })
                });
            }
            let sortKey = this.sortKey;
            let order = this.sortOrders[sortKey] || 1;
            if (sortKey) {
                vardata = vardata.slice().sort((a, b) => {
                    let index = this.getIndex(this.columns, 'name', sortKey);
                    a = String(a[sortKey]).toLowerCase();
                    b = String(b[sortKey]).toLowerCase();
                    if (this.columns[index].type && this.columns[index].type === 'date') {
                        return (a === b ? 0 : new Date(a).getTime() > new Date(b).getTime() ? 1 : -1) * order;
                    } else if (this.columns[index].type && this.columns[index].type === 'number') {
                        return (+a === +b ? 0 : +a > +b ? 1 : -1) * order;
                    } else {
                        return (a === b ? 0 : a > b ? 1 : -1) * order;
                    }
                });
            }
            return vardata;
        },
        paginatedData() {
            return this.paginate(this.filteredUsers, this.length, this.pagination.currentPage);
        }
    }
};
</script>