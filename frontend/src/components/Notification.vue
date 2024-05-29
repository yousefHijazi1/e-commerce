<!-- src/components/Notification.vue -->
<template>
    <div v-if="visible" class="notification-card">
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
  