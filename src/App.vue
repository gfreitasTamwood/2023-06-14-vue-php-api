<template>
  <div>
    <section>
      <div class="container">
        <form v:onsubmit.prevent="postEmployee">
          <div class="mb-3">
            <label for="fName" class="form-label">First Name</label>
            <input type="text" class="form-control" id="fName" name="fName" v-model="employeeObj.fName" placeholder="First Name">
          </div>
          <div class="mb-3">
            <label for="lName" class="form-label">Last Name</label>
            <input type="text" class="form-control" id="lName" name="lName" v-model="employeeObj.lName" placeholder="Last Name">
          </div>
          <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" v-model="employeeObj.email" placeholder="Email">
          </div>
          <div class="mb-3">
            <label for="department" class="form-label">Department</label>
            <input type="text" class="form-control" id="department" name="department" v-model="employeeObj.department" placeholder="Department">
          </div>
          <div class="mb-3">
            <label for="avatar" class="form-label">Avatar</label>
            <input type="text" class="form-control" id="avatar" name="avatar" v-model="employeeObj.avatar" placeholder="Avatar">
          </div>
          <button type="submit" class="btn btn-primary">Button Submit</button>
          <input type="submit" class="btn btn-primary" value="Input Submit"/>
        </form>
      </div>
    </section>
    <EmployeeTable :employees="this.employees"/>
    <article></article>
  </div>
</template>

<script>

import EmployeeTable from './components/EmployeeTable.vue';

export default {
  name: 'App',
  components: {
    EmployeeTable
  },
  data() {
    return {
      employees: [],
      employeeApi: "http://localhost:80/vue-class-03/rest/api/V1/employee.php",
      employeeObj: {
        fName: "",
        lName: "",
        email: "",
        department: "",
        avatar: "",     
      },
    }
  },
  methods: {
    async getEmployees() {
      try {
        let response = await fetch(this.employeeApi);
        this.employees = await response.json();
      } catch(error) {
        console.log(error);
      }
    },
    async postEmployee() {
      try {
        await fetch(
          this.employeeApi,
          {
            method: "POST",
            body: JSON.stringify(this.employeeObj)
          }
        ).then((response) => response.text()
        ).then((data) => {
          console.log(data)
        });

        // this.$http.post(
        //   this.employeeApi,JSON.stringify(this.employeeObj),
        //   {
        //     headers: {
        //       "Content/Type": "application/json"
        //     }
        //   }
        // );
      } catch(error) {
        console.log(error);
      }
    }
  },
  created() {
    this.getEmployees();
  },
  mounted() {
    this.postEmployee();
  }
}
</script>

<style>
#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
  margin-top: 60px;
}
</style>
