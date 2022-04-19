<template>
  <div>
    <h3>Page 2</h3>

    <p>Check session on every call!</p>
  </div>
</template>

 <script>
import axios from "axios";
axios.defaults.withCredentials = true;

export default {
  data() {
    return {};
  },
  methods: {
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
        .then((response) => { //* all Ok
          console.log(response.status);
          console.log(response);
        })
        .catch(() => {
          //* Force log out, delete cookie and push back user
          document.cookie =
            "PHPSESSID=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
          console.log("NOT AUTHORIZED! (Pg2)");
          this.$router.push({ name: "Login" });
        });
    },
    getCookie(name) {
      const value = `; ${document.cookie}`;
      const parts = value.split(`; ${name}=`);
      if (parts.length === 2) return parts.pop().split(";").shift();
      return false;
    },
  },
  beforeMount: function () {
    this.checkLogin();
  },
};
</script>

<style>
</style>