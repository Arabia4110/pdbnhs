<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Fire Login | Modern Tailwind CSS</title>
  <!-- Tailwind CSS CDN -->
  <script src="https://cdn.tailwindcss.com"></script>
  <!-- Font Awesome for icons -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/js/all.min.js" crossorigin="anonymous"></script>
  <style>
    @keyframes flicker {
      0%, 100% { opacity: 1; }
      50% { opacity: 0.8; }
    }
    .flame {
      animation: flicker 2s infinite alternate;
    }
    .flame-1 { animation-delay: 0.1s; }
    .flame-2 { animation-delay: 0.3s; }
    .flame-3 { animation-delay: 0.5s; }
    .flame-4 { animation-delay: 0.7s; }
    .flame-5 { animation-delay: 0.9s; }
    
    .bg-gradient-fire {
      background: linear-gradient(135deg, #f12711 0%, #f5af19 100%);
    }
    
    .btn-fire {
      background: linear-gradient(90deg, #f12711 0%, #f5af19 100%);
      box-shadow: 0 4px 15px rgba(241, 39, 17, 0.4);
      transition: all 0.3s ease;
    }
    
    .btn-fire:hover {
      background: linear-gradient(90deg, #f5af19 0%, #f12711 100%);
      box-shadow: 0 6px 20px rgba(241, 39, 17, 0.6);
      transform: translateY(-2px);
    }
    
    .btn-fire:active {
      transform: translateY(0);
    }
    
    .input-fire:focus {
      border-color: #f5af19;
      box-shadow: 0 0 0 3px rgba(245, 175, 25, 0.2);
    }
  </style>
</head>
<body class="flex items-center justify-center min-h-screen bg-gradient-to-br from-gray-900 to-gray-800">

  <div class="relative bg-gray-800 p-10 rounded-2xl shadow-2xl max-w-md w-full border border-gray-700 overflow-hidden">
    <!-- Fire decoration -->
    <div class="absolute -top-20 -left-10 w-40 h-40 opacity-20">
      <div class="absolute w-8 h-8 rounded-full bg-orange-500 flame flame-1 top-10 left-10"></div>
      <div class="absolute w-6 h-6 rounded-full bg-yellow-500 flame flame-2 top-12 left-14"></div>
      <div class="absolute w-4 h-4 rounded-full bg-yellow-300 flame flame-3 top-14 left-16"></div>
    </div>
    
    <div class="absolute -bottom-10 -right-10 w-40 h-40 opacity-20">
      <div class="absolute w-8 h-8 rounded-full bg-orange-500 flame flame-4 top-10 left-10"></div>
      <div class="absolute w-6 h-6 rounded-full bg-yellow-500 flame flame-5 top-12 left-14"></div>
      <div class="absolute w-4 h-4 rounded-full bg-yellow-300 flame flame-1 top-14 left-16"></div>
    </div>
    
    <!-- Logo and title -->
    <div class="flex flex-col items-center mb-8 relative z-10">
      <div class="w-20 h-20 mb-4 flex items-center justify-center rounded-full bg-gradient-fire shadow-lg">
        <i class="fas fa-fire text-3xl text-white"></i>
      </div>
      <h2 class="text-3xl font-bold text-center text-transparent bg-clip-text bg-gradient-to-r from-orange-400 to-yellow-300">
        Ignite Your Account
      </h2>
      <p class="text-gray-400 mt-2">Welcome back to the flame</p>
    </div>

    <!-- Error message placeholder -->
    <div id="errorMsg" class="hidden mb-4 bg-red-900/50 text-red-300 px-4 py-3 rounded-lg border border-red-700"></div>

    <!-- Login form -->
    <form onsubmit="handleLogin(event)" class="relative z-10">
      <!-- Username -->
      <div class="mb-5">
        <label for="username" class="block mb-2 text-sm font-medium text-gray-300">Username</label>
        <div class="relative">
          <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
            <i class="fas fa-user text-gray-500"></i>
          </div>
          <input
            type="text"
            id="username"
            class="input-fire w-full px-4 py-3 pl-10 bg-gray-700 border border-gray-600 rounded-lg focus:outline-none text-white placeholder-gray-400"
            placeholder="Enter username"
            required
          />
        </div>
      </div>

      <!-- Password with toggle -->
      <div class="mb-6">
        <label for="password" class="block mb-2 text-sm font-medium text-gray-300">Password</label>
        <div class="relative">
          <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
            <i class="fas fa-lock text-gray-500"></i>
          </div>
          <input
            type="password"
            id="password"
            class="input-fire w-full px-4 py-3 pl-10 bg-gray-700 border border-gray-600 rounded-lg focus:outline-none text-white placeholder-gray-400"
            placeholder="Enter password"
            required
          />
          <!-- toggle button -->
          <button
            type="button"
            class="absolute top-1/2 right-3 transform -translate-y-1/2 text-gray-400 hover:text-yellow-400"
            onclick="togglePassword()"
            aria-label="Show/hide password"
          >
            <i class="fas fa-eye" id="passwordIcon"></i>
          </button>
        </div>
      </div>

      <!-- Remember me and Forgot password -->
      <div class="flex items-center justify-between mb-6">
        <div class="flex items-center">
          <input id="remember" type="checkbox" class="w-4 h-4 bg-gray-700 border-gray-600 rounded focus:ring-yellow-500">
          <label for="remember" class="ml-2 text-sm font-medium text-gray-300">Remember me</label>
        </div>
        <a href="#" class="text-sm text-yellow-400 hover:text-yellow-300">Forgot password?</a>
      </div>

      <!-- Submit button -->
      <button
        type="submit"
        class="btn-fire w-full text-white font-bold py-3 px-4 rounded-lg transition duration-200 relative overflow-hidden"
      >
        <span class="relative z-10">Sign In</span>
        <span class="absolute inset-0 bg-gradient-to-r from-transparent via-white/20 to-transparent opacity-0 hover:opacity-100 transition-opacity duration-300"></span>
      </button>
      
      <!-- Sign up link -->
      <div class="mt-6 text-center">
        <p class="text-gray-400">Don't have an account? <a href="#" class="text-yellow-400 hover:text-yellow-300 font-medium">Sign up</a></p>
      </div>
    </form>
  </div>

  <script>
    // Toggle password visibility
    function togglePassword() {
      const pwd = document.getElementById('password');
      const icon = document.getElementById('passwordIcon');
      if (pwd.type === 'password') {
        pwd.type = 'text';
        icon.classList.remove('fa-eye');
        icon.classList.add('fa-eye-slash');
      } else {
        pwd.type = 'password';
        icon.classList.remove('fa-eye-slash');
        icon.classList.add('fa-eye');
      }
    }

    // Mock login validation
    function handleLogin(e) {
      e.preventDefault();
      const username = document.getElementById('username').value;
      const password = document.getElementById('password').value;
      const errorDiv = document.getElementById('errorMsg');

      if (username === 'admin' && password === 'password') {
        // Create fire effect on success
        const btn = e.target.querySelector('button[type="submit"]');
        btn.innerHTML = `
          <span class="relative z-10">Success!</span>
          <span class="absolute inset-0 bg-gradient-to-r from-transparent via-white/30 to-transparent opacity-100"></span>
        `;
        btn.classList.remove('btn-fire');
        btn.classList.add('bg-green-600', 'hover:bg-green-700');
        
        setTimeout(() => {
          alert('Login successful!');
          window.location.href = '#';
        }, 1000);
        
        errorDiv.classList.add('hidden');
      } else {
        errorDiv.classList.remove('hidden');
        errorDiv.textContent = 'Invalid credentials. The fire rejects you.';
        
        // Shake animation for error
        const form = e.target;
        form.classList.add('animate-[shake_0.5s_ease-in-out]');
        setTimeout(() => {
          form.classList.remove('animate-[shake_0.5s_ease-in-out]');
        }, 500);
      }
    }
  </script>
</body>
</html>