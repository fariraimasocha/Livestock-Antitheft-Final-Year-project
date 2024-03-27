<div class="">
    <a href="/">
        <img src="{{ asset('Logos/LATS 1.png') }}" alt="logo" class="w-20 h-20 ml-10 " >
    </a>
    <div class="w-80 mx-auto justify-center mt-24">
    <form  class="bg-white shadow-lg shadow-gray-300 px-2 py-2 rounded" method="post" action="{{ route('login') }}">
        @csrf
        <h1 class="px-4 font-semibold text-3xl">Sign In</h1>
        <p class="px-4 text-l">Stay connected to your livestock</p>
        <div class="mt-4 px-4">
            <label for="email" class="text-sm">Email</label>
            <input type="email" name="email" id="email" class="w-full border-2 rounded px-2 py-2">
        </div>
        @error('email')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <div class="mt-4 px-4">
            <label for="password" class="text-sm">Password</label>
            <input type="password" name="password" id="password" class="w-full border-2 rounded px-2 py-2">
        </div>
        @error('password')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <button class="text-l mt-2 px-4 text-blue-700 font-semibold">
           Forgot Password ?
        </button>
        <div class="mt-4 px-4">
            <button class="w-full rounded-3xl bg-blue-700 hover:bg-blue-400 text-white h-10 transition">
              Sign In
            </button>
        </div>
        <div class="mt-4 px-4 border-b-2">
        </div>
        <div class="mt-4 px-4">
            <button class="w-full rounded-3xl text-black h-10 border-black border-2">
                Sign In with Magic Link
            </button>
        </div>
    </form>
    <h1 class="mt-5 text-center text-l">New to Lats ? <span class="text-blue-700 font-semibold"><a href="/register">Join now</a></span></h1>
</div>
</div>



