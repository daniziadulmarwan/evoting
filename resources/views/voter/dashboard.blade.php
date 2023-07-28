<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>EVoting</title>
   <!-- Fonts Poppins -->
   <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

   @livewireStyles

    @vite('resources/css/app.css')

    <style>
      body {
        font-family: 'Poppins', sans-serif;
      }
    </style>
  
</head>
<body>

  <!-- Navbar Start -->
  <nav class="bg-white border-gray-200 dark:bg-gray-900">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
      <a href="/voter/dashboard" class="flex items-center">
          <img src="/assets/images/light.png" class="h-10 mr-3" alt="Flowbite Logo" />
          <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">E-Voting</span>
      </a>
      <div class="flex items-center md:order-2">
          <button type="button" class="flex mr-3 text-sm bg-gray-800 rounded-full md:mr-0 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600" id="user-menu-button" aria-expanded="false" data-dropdown-toggle="user-dropdown" data-dropdown-placement="bottom">
            <span class="sr-only">Open user menu</span>
            <img class="w-8 h-8 rounded-full" src="/assets/images/profile.jpg" alt="user photo">
          </button>
          <!-- Dropdown menu -->
          <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow dark:bg-gray-700 dark:divide-gray-600" id="user-dropdown">
            <div class="px-4 py-3">
              <span class="block text-sm text-gray-900 dark:text-white">{{ auth()->user()->fullname }}</span>
              <span class="block text-xs  text-gray-500 truncate dark:text-gray-400">{{ auth()->user()->username }}</span>
            </div>
            <ul class="py-2" aria-labelledby="user-menu-button">
              <li>
                <a href="/voter/dashboard" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Dashboard</a>
              </li>
              <li>
                <a data-modal-target="settingModal" data-modal-toggle="settingModal" href="javascript:void()" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Settings</a>
              </li>
              <li>
                <form action="/logout" method="post" class="inline-block w-full">
                @csrf @method('delete')
                  <button type="submit" class="inline-block w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Sign out</button>
                </form>
              </li>
            </ul>
          </div>
          <button type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-expanded="false">
            <span class="sr-only">Open main menu</span>
            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
            </svg>
        </button>
      </div>
    </div>
  </nav>
  <!-- Navbar End -->

  @if (auth()->user()->status == 'voted')
    <div class="container mx-auto mt-36 px-36">
      <div class="text-center p-4 mb-4 text-lg text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
        <span class="font-medium">Selamat!</span> Vote anda telah disimpan.
      </div>
    </div>
  @else
    <!-- Voting -->
    <div class="relative flex min-h-screen flex-col justify-center mt-16">
      <div class="mx-auto">

        <div class="mb-5">
          <h4 class="text-5xl uppercase font-black text-center text-transparent bg-clip-text bg-gradient-to-b from-indigo-500 to-cyan-400">{{ $setting->title }}</h4>
        </div>
        
        <form action="{{ route('main.voter.vote') }}" method="post" class="border shadow-sm border-gray-100 rounded-md p-5 mb-16">
          @csrf

          <!-- Title -->
          <div class="mb-10 bg-sky-100 px-5 py-3">
            <h5 class="text-center text-lg text-cyan-600 uppercase">Silahkan memilih 11 dari 33 calon Formatur</h5>
          </div>

          <div class="grid gap-4 grid-cols-2 md:grid-cols-6 vote-wrapper">
            @foreach ($data as $item)
              <label class="relative cursor-pointer max-w-[192px]">
                  <input type="checkbox" multiple class="sr-only peer" name="vote[]" value="{{ $item->id }}">
                  <span class="absolute top-2 right-2 z-20 opacity-0 peer-checked:opacity-100 transition-all">
                    <svg xmlns="http://www.w3.org/2000/svg" class="fill-blue-500 stroke-white" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                      <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                      <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0"></path>
                      <path d="M9 12l2 2l4 -4"></path>
                    </svg>
                  </span>
                  <div class="relative overflow-hidden rounded-lg shadow-md ring-transparent grayscale peer-checked:grayscale-0 active:scale-95 transition-all">
                      <img src="/assets/images/megamenu-bg.png" class="absolute bottom-0 w-16 right-0 grayscale-0">
                      <div>
                        <img src="{{ $item->photo ? '/storage/'. $item->photo : '/assets/images/profile.jpg' }}" alt="{{ $item->name }}" class="h-48 w-48 object-cover">
                      </div>
                      <header class="p-2.5 min-h-[80px] max-h-[80px] grid place-items-center">
                        <p class="text-base text-center mt-5 font-semibold tracking-wide text-gray-800 w-40">{{ $item->fullname }}</p>
                      </header>
                  </div>
              </label>
            @endforeach
          </div>
          <!-- Floating Vote Button Start -->
          <div class="fixed bottom-3 right-5 grid place-items-center z-50">
            <img src="/assets/images/voting-box.png" width="80" id="vote-icon" class="hidden transition-all animate-bounce">
            <button type="submit" disabled class="bg-blue-500 py-2 px-3 rounded text-white w-full hover:bg-blue-600 disabled:bg-gray-400 btn-submit">
              Vote Now</button>
          </div>
          <!-- Floating Vote Button End -->

        </form>

      </div>
    </div>
  @endif

  <x-voter.footer />

  @include('voter.setting')


  @livewireScripts
  <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.7.0/flowbite.min.js"></script>
  <script src="/assets/custom/helpers.js"></script>
  <script>
    const maxVote = <?php echo $setting->max_vote ?>;
    const btnSubmit = document.querySelector('.btn-submit')
    const voteIcon = document.querySelector('#vote-icon')

    document.addEventListener('change', (e) => {
      if(e.target.tagName == 'INPUT') {
        if(document.querySelectorAll('.vote-wrapper input[type="checkbox"]:checked').length === maxVote || document.querySelectorAll('.vote-wrapper input[type="checkbox"]:checked').length > maxVote) {
          btnSubmit.removeAttribute('disabled');
          voteIcon.classList.remove('hidden')
        } else {
          voteIcon.classList.add('hidden')
          btnSubmit.setAttribute('disabled');
        }

        if(document.querySelectorAll('.vote-wrapper input[type="checkbox"]:checked').length > maxVote) {
          e.target.checked = false;
        }

      }
    });
  </script>
</body>
</html>