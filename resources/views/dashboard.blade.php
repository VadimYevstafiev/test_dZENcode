<x-app-layout>
    <div class="flex h-screen overflow-hidden">
        <!-- Sidebar -->
        <div class="w-1/4 bg-white border-r border-gray-300">
          <!-- Sidebar Header -->
          <header class="p-4 border-b border-gray-300 flex justify-between items-center bg-indigo-600 text-white">
            <h1 class="text-2xl font-semibold">Chat Web</h1>
            <div class="relative">
              <button id="menuButton" class="focus:outline-none">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-100" viewBox="0 0 20 20" fill="currentColor">
                  <path d="M10 12a2 2 0 100-4 2 2 0 000 4z" />
                  <path d="M2 10a2 2 0 012-2h12a2 2 0 012 2 2 2 0 01-2 2H4a2 2 0 01-2-2z" />
                </svg>
              </button>
              <!-- Menu Dropdown -->
              <div id="menuDropdown" class="absolute right-0 mt-2 w-48 bg-white border border-gray-300 rounded-md shadow-lg hidden">
                <ul class="py-2 px-3">
                  <li><a href="#" class="block px-4 py-2 text-gray-800 hover:text-gray-400">Option 1</a></li>
                  <li><a href="#" class="block px-4 py-2 text-gray-800 hover:text-gray-400">Option 2</a></li>
                  <!-- Add more menu options here -->
                </ul>
              </div>
            </div>
          </header>
        
          <!-- Contact List -->
          <div class="overflow-y-auto h-screen p-3 mb-9 pb-20">
            <div class="flex items-center mb-4 cursor-pointer hover:bg-gray-100 p-2 rounded-md">
              <div class="w-12 h-12 bg-gray-300 rounded-full mr-3">
                <img src="https://placehold.co/200x/ffa8e4/ffffff.svg?text=ʕ•́ᴥ•̀ʔ&font=Lato" alt="User Avatar" class="w-12 h-12 rounded-full">
              </div>
              <div class="flex-1">
                <h2 class="text-lg font-semibold">Alice</h2>
                <p class="text-gray-600">Hoorayy!!</p>
              </div>
            </div>

          </div>
        </div>
        
        <!-- Main Chat Area -->
        <div class="flex-1">
            <!-- Chat Header -->
            <header class="bg-white p-4 text-gray-700">
                <h1 class="text-2xl font-semibold">Alice</h1>
            </header>
            
            <!-- Chat Messages -->
            <div class="h-screen overflow-y-auto p-4 pb-36">
               <!-- Incoming Message -->
                <div class="flex mb-4 cursor-pointer bg-white rounded-lg p-3 gap-3 grid grid-cols-1">

                    <div class="flex w-full ">
                        <div class="w-9 h-9 rounded-full flex items-center justify-center mr-2">
                            <img src="https://placehold.co/200x/ffa8e4/ffffff.svg?text=ʕ•́ᴥ•̀ʔ&font=Lato" alt="User Avatar" class="w-8 h-8 rounded-full">
                        </div>
                        <h1 class="text-2xl font-semibold">Alice</h1>
                        <!-- <p class="text-gray-700">Hey Bob, how's it going?</p> -->
                    </div>
                    <div class="flex w-full ps-9">
                        <p class="text-gray-700">Hey Bob, how's it going?</p>
                    </div>

                    <div class="flex w-full ps-9">

                    </div>                    
                </div>
                

            </div>
            
            <!-- Chat Input -->
            <footer class="bg-white border-t border-gray-300 p-4 absolute bottom-0 w-3/4">
                <div class="flex items-center">
                    <input type="text" placeholder="Type a message..." class="w-full p-2 rounded-md border border-gray-400 focus:outline-none focus:border-blue-500">
                    <button class="bg-indigo-500 text-white px-4 py-2 rounded-md ml-2">Send</button>
                </div>
            </footer>
        </div>
    </div>
    <script>
      // JavaScript for showing/hiding the menu
      const menuButton = document.getElementById('menuButton');
      const menuDropdown = document.getElementById('menuDropdown');
      
      menuButton.addEventListener('click', () => {
        if (menuDropdown.classList.contains('hidden')) {
          menuDropdown.classList.remove('hidden');
        } else {
          menuDropdown.classList.add('hidden');
        }
      });
      
      // Close the menu if you click outside of it
      document.addEventListener('click', (e) => {
        if (!menuDropdown.contains(e.target) && !menuButton.contains(e.target)) {
          menuDropdown.classList.add('hidden');
        }
      });
    </script>
</x-app-layout>
