<template>
  <div>
    <notifications group="success" position="top center" class="">
      <template slot="body" slot-scope="props">
        <div class="successful-notification flex items-center p-5 mt-5">
          <svg
            xmlns="http://www.w3.org/2000/svg"
            width="24"
            height="24"
            viewBox="0 0 24 24"
            fill="none"
            stroke="currentColor"
            stroke-width="2"
            stroke-linecap="round"
            stroke-linejoin="round"
            class="mr-3"
          >
            <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
            <polyline points="22 4 12 14.01 9 11.01"></polyline>
          </svg>

          <p class="font-bold" v-html="props.item.text"></p>
        </div>
      </template>
    </notifications>
    <notifications group="error" position="top center" class="">
      <template slot="body" slot-scope="props">
        <div class="error-notification flex items-center p-5 mt-5">
          <svg
            xmlns="http://www.w3.org/2000/svg"
            width="24"
            height="24"
            viewBox="0 0 24 24"
            fill="none"
            stroke="currentColor"
            stroke-width="2"
            stroke-linecap="round"
            stroke-linejoin="round"
            class="mr-3"
          >
            <circle cx="12" cy="12" r="10"></circle>
            <line x1="12" y1="8" x2="12" y2="12"></line>
            <line x1="12" y1="16" x2="12.01" y2="16"></line>
          </svg>

          <p class="font-bold" v-html="props.item.text"></p>
        </div>
      </template>
    </notifications>
    <notifications group="warning" position="top center" class="">
      <template slot="body" slot-scope="props">
        <div class="warning-notification flex items-center p-5 mt-5">
          <svg
            xmlns="http://www.w3.org/2000/svg"
            width="24"
            height="24"
            viewBox="0 0 24 24"
            fill="none"
            stroke="currentColor"
            stroke-width="2"
            stroke-linecap="round"
            stroke-linejoin="round"
            class="mr-3"
          >
            <circle cx="12" cy="12" r="10"></circle>
            <line x1="12" y1="8" x2="12" y2="12"></line>
            <line x1="12" y1="16" x2="12.01" y2="16"></line>
          </svg>

          <p class="font-bold" v-html="props.item.text"></p>
        </div>
      </template>
    </notifications>
  </div>
</template>

<script>
export default {};
</script>

<style scoped>
.tertiary-notification,
.error-notification,
.warning-notification
.successful-notification {
  height: 60px;
  box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.15);
  border-radius: 2px;
  @apply text-white;
}

.error-notification {
  background: #ff0000;
  color: white;
}

.successful-notification {
  background: #00715D;
  color: white;
}

.warning-notification {
  background: #ffcc00;
}
</style>