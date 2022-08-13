<div class="w-96 md:max-w-2xl md:w-full mx-auto bg-gradient-to-r from-white to-slate-50 p-5 my-5 border-2 border-transparent shadow-xl bg-opacity-50 ">
  <header class="p-1 border-b-4 text-center">
      <h2 class="font-oswald font-bold text-3xl text-gray-800">Create a Gig</h2>
      <p class="font-roboto text-gray-700 font-normal text-lg">post a gig to find a developer</p>
  </header>
  <form action="" method="post" enctype="multipart/form-data">
      @csrf
      <div class="md:flex justify-between w-full">
          {{-- username --}}
          <div class="p-1 m-1 w-full">
              <label for="username" class="font-medium text-gray-700 block my-1 capitalize">Username</label>
              <input type="text" name="username" value="{{old('username')}}" class="p-1 w-full capitalize rounded-md focus:outline-blue-500 block border-[1px] border-gray-300 @error('username') invalid-input @enderror">
              @error('username')
                  <small class="text-red-600 text-sm"> {{$message}}</small>
              @enderror
          </div>

          {{-- email address--}}
          <div class="p-1 m-1 w-full">
              <label for="email" class=" font-medium text-gray-700 block my-1 capitalize">Email</label>
              <input type="email" name="email" value="{{old('email')}}" placeholder="example@email.com" class="capitalize p-1 w-full rounded-md focus:outline-blue-500 block border-[1px] border-gray-300 @error('email') invalid-input @enderror">
              @error('email')
                  <small class="text-red-600 text-sm"> {{$message}}</small>
              @enderror
          </div>
      </div>

      {{-- password --}}
      <div class="p-1 m-1">
          <label for="password" class="font-medium text-gray-700 block my-1 capitalize">password</label>
          <input type="password" name="password" value="{{old('password')}}" placeholder="Create Password" class="p-1 w-full rounded-md focus:outline-blue-500 block border-[1px] border-gray-300 @error('password') invalid-input @enderror">
          @error('password')
              <small class="text-red-600 text-sm"> {{$message}}</small>
          @enderror
      </div>

      {{-- confirm_password --}}
      <div class="p-1 m-1">
          <label for="confirm_password" class="font-medium text-gray-700 block my-1 capitalize">confirm password</label>
          <input type="confirm_password" name="confirm_password" value="{{old('confirm_password')}}" placeholder="Create confirm_Password" class="p-1 w-full rounded-md focus:outline-blue-500 block border-[1px] border-gray-300 @error('confirm_password') invalid-input @enderror">
          @error('confirm_password')
              <small class="text-red-600 text-sm"> {{$message}}</small>
          @enderror
      </div>

      <div class="p-1 m-1 flex justify-center w-full">
          <input type="submit" value="Create Account" class="py-2  rounded-md cursor-pointer px-3 bg-gradient-to-r from-green-600 to-green-500 text-white">
      </div>
  </form>
</div>