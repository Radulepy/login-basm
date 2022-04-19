<template>
  <div class="border border-light p-3 mb-4">
    <div class="d-flex align-items-center justify-content-center mt-5 mb-auto">
      <LoginForm></LoginForm>
    </div>
  </div>
</template>

<script>
import LoginForm from "../components/LoginForm.vue";

export default {
  components: {
    LoginForm,
  },
};
</script>

<style>
</style>