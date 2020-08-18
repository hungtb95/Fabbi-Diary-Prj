<template>
  <footer>
    <div>
      <span
        class="ml-md-1 footer-info"
      >Copyright &copy; {{ new Date().getFullYear() }} Fabbi JSC. All rights reserved.</span>
    </div>
  </footer>
</template>

<script>
export default {};
</script>

<style scoped>
footer {
  position: fixed;
  bottom: 0px;
  background-color: #f1f1f1;
  width: 100%;
  min-height: 50px;
  display: flex;
  align-items: center;
  justify-content: center;
}
</style>
