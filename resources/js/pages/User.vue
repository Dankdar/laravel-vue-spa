<template>
<div class="container px-2 md:px-0 mx-auto space-y-2">
  <div class="md:flex md:justify-between md:space-x-2 py-6">
    <div class="md:w-1/3 pb-4">
      <h3 class="text-xl text-white" >Profile</h3>
      <p class="mt-1 text-sm text-gray-800">
        Update your account's profile information and email address.
      </p>
    </div>
    <profile-update class="md:w-2/3 p-4 bg-gradient-to-r from-fuchsia-500 to-violet-400 shadow-md rounded-lg"></profile-update>
  </div>

  <div class="md:flex md:justify-between md:space-x-2 py-6">
    <div class="md:w-1/3 pb-4">
      <h3 class="text-xl text-white">Password</h3>
      <p class="mt-1 text-sm text-gray-800">
        Ensure your account is using a long, random password to stay secure.
      </p>
    </div>
    <password-update class="md:w-2/3 p-4 bg-white shadow-md rounded-lg"></password-update>
  </div>

  <div class="md:flex md:justify-between md:space-x-2 py-6">
    <div class="md:w-1/3 pb-4">
      <h3 class="text-xl text-white">Profile picture</h3>
      <p class="mt-1 text-sm text-gray-800">
        upload your image to set as profile image.
      </p>
    </div>
    <profile-picture class="md:w-2/3 p-4 bg-white shadow-md rounded-lg"></profile-picture>
  </div>

  <hr>
  <div class="md:flex md:justify-between md:space-x-2 py-6">
    <div class="md:w-1/3 pb-4">
      <h3 class="text-xl text-white">Two Factor Authentication</h3>
      <p class="mt-1 text-sm text-gray-800">
        Add additional security to your account using two factor authentication.
      </p>
    </div>
    <two-factore-authentication class="md:w-2/3 p-4 bg-white shadow-md rounded-lg"></two-factore-authentication>
  </div>
</div>
</template>

<script>
import TwoFactoreAuthentication from '@/js/components/user/TwoFactoreAuthentication'
import ProfilePicture from '@/js/components/user/ProfilePicture'
import ProfileUpdate from '@/js/components/user/ProfileUpdate'
import PasswordUpdate from '@/js/components/user/PasswordUpdate'

export default {
  components: {
    TwoFactoreAuthentication,
    ProfileUpdate,
    PasswordUpdate,
    ProfilePicture,
  }
  
}
</script>
