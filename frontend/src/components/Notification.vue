<!-- src/components/Notification.vue -->
<template>
    <div v-if="visible" class="notification-card">
      <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
        <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
          <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
        </symbol>
      </svg>
      <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
      {{ message }}
      <div class="timeline"></div>
    </div>
  </template>
  
  <script>
  export default {
    name: 'NotificationComponent',
    props: {
      message: {
        type: String,
        required: true
      }
    },
    data() {
      return {
        visible: false
      };
    },
    methods: {
      show() {
        this.visible = true;
        setTimeout(() => {
          this.visible = false;
        }, 3000); // Display for 3 seconds
      }
    }
  };
  </script>
  
  <style scoped>
  .notification-card {
    position: fixed;
    top: 20px;
    right: 20px;
    background-color: #4d6f9c;
    color: white;
    padding: 15px;
    border-radius: 5px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    z-index: 1000;
    overflow: hidden;
  }
  
  .timeline {
    position: absolute;
    bottom: 0;
    left: 0;
    height: 5px;
    background-color: #abc2e2;
    animation: moveTimeline 3s linear forwards;
  }
  
  @keyframes moveTimeline {
    from {
      width: 100%;
      left: 0;
    }
    to {
      width: 0%;
      left: 100%;
    }
  }
  </style>
  