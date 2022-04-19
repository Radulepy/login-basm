<template>
  <form @submit.prevent>
    <!-- Email input -->
    <div class="form-outline mb-4">
      <input type="email" id="form2Example1" class="form-control" />
      <label class="form-label" for="form2Example1">Email address</label>
    </div>

    <!-- Password input -->
    <div class="form-outline mb-4">
      <input type="password" id="form2Example2" class="form-control" />
      <label class="form-label" for="form2Example2">Password</label>
    </div>

    <button type="button" class="btn btn-success w-100" @click="this.login()">
      Login
    </button>
    <button
      type="button"
      class="btn btn-warning w-100"
      @click="this.checkLogin()"
    >
      Check Login
    </button>
    <button type="button" class="btn btn-danger w-100" @click="this.logout()">
      Logout
    </button>

    <button
      type="button"
      class="btn btn-secondary mt-5 w-100"
      @click="this.createCookie()"
    >
      CREATE
    </button>

    <router-link :to="{ name: 'Page2' }"> page2 </router-link>
  </form>
</template>

<script>
import axios from "axios";

axios.defaults.withCredentials = true;







export default {
  data() {
    return {
      pass: "",
      user: "",
    };
  },
  methods: {
    login() {
      const data = new URLSearchParams();
      data.append("user", "user");
      data.append("pass", "pass");

      axios
        .post("http://localhost:80/api/v1/login.php", data, {
          headers: {
            "Content-Type": "application/x-www-form-urlencoded",
          },
        })
        .then((response) => {
          console.log(response);
        //   console.log(this.getCookie("PHPSESSID"));
        })
        .catch((error) => {
          console.log("ERROR" + error);
        });
    },
    getCookie(name) {
      const value = `; ${document.cookie}`;
      const parts = value.split(`; ${name}=`);
      if (parts.length === 2) return parts.pop().split(";").shift();
      return false;
    },

    logout() {
      console.log("logged out");
      //TODO: WHEN LOGOUT:
      document.cookie =
        "PHPSESSID=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
    },

    checkLogin() {
      // TODO: de apelat mereu inainte sa incarca contentul de pe server
      const data = new URLSearchParams();
      data.append("PHPSESSID", this.getCookie("PHPSESSID")); // send token back

      axios
        .post("http://localhost:80/api/v1/login_check.php", data, {
          headers: {
            "Content-Type": "application/x-www-form-urlencoded",
          },
        })
        .then((response) => {
          console.log(response.status);
          console.log(response);
          console.log(response.data);
          if (response.data === "SESSION NOT OK!") {
            document.cookie =
              "PHPSESSID=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
            console.log("stergere");
          }
        })
        .catch((error) => {
          if (error.response.status === 403) {
            //log out force
            document.cookie =
              "PHPSESSID=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
            console.log("NOT AUTHORIZED!");
          }
        });
    },
    createCookie() {
      document.cookie = "PHPSESSID=John Doe";
    },
  },
};
</script>

<style>
</style>