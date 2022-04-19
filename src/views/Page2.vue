<template>
  <h3>Page 2</h3>

  <p>de verificat daca ID-ul aceasi ca a serverului si nu una oarecare</p>
</template>

 <script>
// import axios from "axios";
// axios.defaults.withCredentials = true;

// export default {
//   data() {
//     return {};
//   },
//   methods: {
//     checkLogin() {
//       // TODO: de apelat mereu inainte sa incarca contentul de pe server
//       const data = new URLSearchParams();
//       data.append("PHPSESSID", this.getCookie("PHPSESSID")); // send token back

//       axios
//         .post("http://localhost:80/api/v1/login_check.php", data, {
//           headers: {
//             "Content-Type": "application/x-www-form-urlencoded",
//           },
//         })
//         .then((response) => {
//           console.log(response.status);
//           console.log(response);
//           console.log(response.data);
//           return true;
//         })
//         .catch(() => {
        
//             //log out force
//             document.cookie =
//               "PHPSESSID=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
//             console.log("NOT AUTHORIZED! (Pg2)");
//             return false;
          
//         });
//     },
//     getCookie(name) {
//       const value = `; ${document.cookie}`;
//       const parts = value.split(`; ${name}=`);
//       if (parts.length === 2) return parts.pop().split(";").shift();
//       return false;
//     },
//   },
//   beforeMount: function () {
//     if (!this.checkLogin()) {
//       console.log('pleaca!');
//       this.$router.push("/");

//     }
//   },
// };
</script>

<style>
</style>