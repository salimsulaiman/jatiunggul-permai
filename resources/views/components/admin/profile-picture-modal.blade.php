<div x-show="isProfilePictureModal" x-data="profileImagePreview('{{ Auth::user()->profile ? asset('storage/' . Auth::user()->profile) : asset('assets/images/person/default-profile.png') }}')"
    class="fixed inset-0 flex items-center justify-center p-5 overflow-y-auto z-99999">
    <div class="modal-close-btn fixed inset-0 h-full w-full bg-gray-400/50 backdrop-blur-[32px]"></div>
    <div @click.outside="resetImage(); isProfilePictureModal = false"
        class="no-scrollbar relative w-full max-w-[700px] overflow-y-auto rounded-3xl bg-white p-4 dark:bg-gray-900 lg:p-11">
        <!-- close btn -->
        <button @click="resetImage(); isProfilePictureModal=false"
            class="transition-color absolute right-5 top-5 z-999 flex h-11 w-11 items-center justify-center rounded-full bg-gray-100 text-gray-400 hover:bg-gray-200 hover:text-gray-600 dark:bg-gray-700 dark:bg-white/[0.05] dark:text-gray-400 dark:hover:bg-white/[0.07] dark:hover:text-gray-300">
            <svg class="fill-current" width="24" height="24" viewBox="0 0 24 24" fill="none"
                xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" clip-rule="evenodd"
                    d="M6.04289 16.5418C5.65237 16.9323 5.65237 17.5655 6.04289 17.956C6.43342 18.3465 7.06658 18.3465 7.45711 17.956L11.9987 13.4144L16.5408 17.9565C16.9313 18.347 17.5645 18.347 17.955 17.9565C18.3455 17.566 18.3455 16.9328 17.955 16.5423L13.4129 12.0002L17.955 7.45808C18.3455 7.06756 18.3455 6.43439 17.955 6.04387C17.5645 5.65335 16.9313 5.65335 16.5408 6.04387L11.9987 10.586L7.45711 6.04439C7.06658 5.65386 6.43342 5.65386 6.04289 6.04439C5.65237 6.43491 5.65237 7.06808 6.04289 7.4586L10.5845 12.0002L6.04289 16.5418Z"
                    fill="" />
            </svg>
        </button>
        <div class="px-2 pr-14">
            <h4 class="mb-2 text-2xl font-semibold text-gray-800 dark:text-white/90">
                Edit Profile Picture
            </h4>
            <p class="mb-6 text-sm text-gray-500 dark:text-gray-400 lg:mb-7">
                Update your profile picture.
            </p>
        </div>
        <form class="flex flex-col" action="{{ route('admin.profile-picture.update') }}" method="POST"
            enctype="multipart/form-data">
            @csrf
            <div class="custom-scrollbar h-[150px] overflow-y-auto px-2">
                <input type="hidden" name="id" id="id" value="{{ Auth::user()->id }}">
                <div class="w-full h-full flex items-center justify-center">
                    <!-- Hidden File Input -->
                    <input x-ref="fileInput" type="file" name="profile" class="hidden" id="photoInput"
                        accept="image/*" @change="previewImage">

                    <!-- Preview Area (Clickable) -->
                    <label for="photoInput" class="cursor-pointer">
                        <div class="rounded-full h-36 w-36 border-2 border-slate-300 bg-slate-200 overflow-hidden">
                            <img x-show="imageUrl" :src="imageUrl" class="w-full h-full object-cover"
                                alt="Profile Preview" />
                        </div>
                    </label>
                </div>
            </div>
            <div class="flex items-center gap-3 px-2 mt-6 lg:justify-end">
                <button @click="resetImage(); isProfilePictureModal = false" type="button"
                    class="flex w-full justify-center rounded-lg border border-gray-300 bg-white px-4 py-2.5 text-sm font-medium text-gray-700 hover:bg-gray-50 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-white/[0.03] sm:w-auto">
                    Close
                </button>
                <button type="submit" :disabled="!isChanged"
                    :class="{
                        'opacity-50 cursor-not-allowed bg-brand-400 hover:bg-brand-500 text-white': !isChanged,
                        'bg-brand-500 hover:bg-brand-600 text-white': isChanged
                    }"
                    class="flex w-full justify-center rounded-lg px-4 py-2.5 text-sm font-medium text-white sm:w-auto transition">
                    Save Changes
                </button>
            </div>
        </form>
    </div>
    @section('script')
        <script>
            function profileImagePreview(initialUrl) {
                return {
                    imageUrl: initialUrl,
                    originalUrl: initialUrl,

                    previewImage(event) {
                        const file = event.target.files[0];
                        if (file && file.type.startsWith('image/')) {
                            const reader = new FileReader();
                            reader.onload = (e) => {
                                this.imageUrl = e.target.result;
                            };
                            reader.readAsDataURL(file);
                        }
                    },

                    resetImage() {
                        this.imageUrl = this.originalUrl;
                        this.$refs.fileInput.value = null;
                    },

                    get isChanged() {
                        return this.imageUrl !== this.originalUrl;
                    },
                }
            }
        </script>
    @endsection
</div>
<div x-show="isDeleteProfilePictureModal"
    class="fixed inset-0 flex items-center justify-center p-5 overflow-y-auto z-99999">
    <div class="modal-close-btn fixed inset-0 h-full w-full bg-gray-400/50 backdrop-blur-[32px]"></div>
    <div @click.outside="isDeleteProfilePictureModal = false"
        class="no-scrollbar relative w-full max-w-[700px] overflow-y-auto rounded-3xl bg-white p-4 dark:bg-gray-900 lg:p-11">
        <!-- close btn -->
        <button @click="isDeleteProfilePictureModal = false"
            class="transition-color absolute right-5 top-5 z-999 flex h-11 w-11 items-center justify-center rounded-full bg-gray-100 text-gray-400 hover:bg-gray-200 hover:text-gray-600 dark:bg-gray-700 dark:bg-white/[0.05] dark:text-gray-400 dark:hover:bg-white/[0.07] dark:hover:text-gray-300">
            <svg class="fill-current" width="24" height="24" viewBox="0 0 24 24" fill="none"
                xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" clip-rule="evenodd"
                    d="M6.04289 16.5418C5.65237 16.9323 5.65237 17.5655 6.04289 17.956C6.43342 18.3465 7.06658 18.3465 7.45711 17.956L11.9987 13.4144L16.5408 17.9565C16.9313 18.347 17.5645 18.347 17.955 17.9565C18.3455 17.566 18.3455 16.9328 17.955 16.5423L13.4129 12.0002L17.955 7.45808C18.3455 7.06756 18.3455 6.43439 17.955 6.04387C17.5645 5.65335 16.9313 5.65335 16.5408 6.04387L11.9987 10.586L7.45711 6.04439C7.06658 5.65386 6.43342 5.65386 6.04289 6.04439C5.65237 6.43491 5.65237 7.06808 6.04289 7.4586L10.5845 12.0002L6.04289 16.5418Z"
                    fill="" />
            </svg>
        </button>
        <div class="px-2 pr-14">
            <h4 class="mb-2 text-2xl font-semibold text-gray-800 dark:text-white/90">
                Delete Profile Picture
            </h4>
        </div>
        <form class="flex flex-col" method="POST" action="{{ route('admin.profile-picture.destroy') }}">
            @csrf
            <div class="custom-scrollbar h-[80px] overflow-y-auto px-2">
                <div class="flex w-full h-full items-center">
                    <input type="hidden" name="id" id="id" value="{{ Auth::user()->id }}">
                    <h4 class="text-slate-500">Are You sure to delete this profile picture?.</h4>
                </div>
            </div>
            <div class="flex items-center gap-3 px-2 mt-6 lg:justify-end">
                <button @click="isDeleteProfilePictureModal = false" type="button"
                    class="flex w-full justify-center rounded-lg border border-gray-300 bg-white px-4 py-2.5 text-sm font-medium text-gray-700 hover:bg-gray-50 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-white/[0.03] sm:w-auto">
                    Close
                </button>
                <button type="submit"
                    class="flex w-full bg-red-700 hover:bg-red-800 justify-center rounded-lg px-4 py-2.5 text-sm font-medium text-white sm:w-auto transition">
                    Delete
                </button>
            </div>
        </form>
    </div>
</div>
