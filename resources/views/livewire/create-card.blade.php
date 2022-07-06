<div>
    <style>
         @media(max-width: 665px){
            .parent-input {
                margin-left: 20px !important;
                margin-right: 20px !important;
            }
         }

    </style>
    <!-- component -->
    <div class="grid bg-white rounded-lg shadow w-full">
        <div class="flex justify-center pt-5">
            <div class="flex">
                <h1 class="text-gray-600 font-bold md:text-2xl text-xl">Create Your Card</h1>
            </div>
        </div>

        <div class="parent-input grid grid-cols-1 mt-2 mx-7">
            <label class="uppercase md:text-sm text-xs text-gray-700 font-semibold">Name</label>
            <input wire:model="name" class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" type="text" placeholder="Yor name..." />
            @error('name') <span class="error text-red-500 text-xs">{{ $message }} !</span> @enderror
        </div>

        @if ($this->preview)
            <div class="parent-input grid grid-cols-1 mt-5 mx-7">
                <label class="uppercase md:text-sm text-xs text-gray-700 font-semibold mb-1">Upload Profile Photo(One Photo)</label>
                <div class='flex items-center justify-center w-full'>
                    <label class='flex flex-col border-4 border-dashed w-full h-32 hover:bg-gray-100 hover:border-purple-300 group'>
                        <div class='flex flex-col relative h-32 items-center justify-center'>
                            <div class="mt-4" wire:loading wire:target="profile_photo">
                                <div class="spinner">
                                    <div class="rect1"></div>
                                    <div class="rect2"></div>
                                    <div class="rect3"></div>
                                    <div class="rect4"></div>
                                    <div class="rect5"></div>
                                </div>
                            </div>
                            <input wire:model="profile_photo" type='file' class="hidden" />
                            <span class="absolute top-0 text-purple-500 cursor-pointer">
                                <svg style="width:24px;height:24px" viewBox="0 0 24 24">
                                    <path fill="currentColor" d="M12 0L11.34 .03L15.15 3.84L16.5 2.5C19.75 4.07 22.09 7.24 22.45 11H23.95C23.44 4.84 18.29 0 12 0M12 4C10.07 4 8.5 5.57 8.5 7.5C8.5 9.43 10.07 11 12 11C13.93 11 15.5 9.43 15.5 7.5C15.5 5.57 13.93 4 12 4M.05 13C.56 19.16 5.71 24 12 24L12.66 23.97L8.85 20.16L7.5 21.5C4.25 19.94 1.91 16.76 1.55 13H.05M12 13C8.13 13 5 14.57 5 16.5V18H19V16.5C19 14.57 15.87 13 12 13Z" />
                                </svg>
                            </span>
                            @if (!is_string($profile_photo))
                                <img style="height: 100px !important;" src="{{ $profile_photo->temporaryUrl() }}">
                            @else
                                <img class="img-preview" style="height: 90px !important;" src="{{ asset('storage/profile_photos/' . $this->preview_profile_photo) }}" alt="">
                            @endif
                        </div>
                    </label>
                </div>
            </div>
        @else
            <div class="parent-input grid grid-cols-1 mt-5 mx-7">
                <label class="uppercase md:text-sm text-xs text-gray-700 font-semibold mb-1">Upload Profile Photo(One Photo)</label>
                <div class='flex items-center justify-center w-full'>
                    <label class='flex flex-col border-4 border-dashed w-full h-32 hover:bg-gray-100 hover:border-purple-300 group'>
                        <div class='flex flex-col relative h-32 items-center justify-center'>
                            <div class="mt-4" wire:loading wire:target="profile_photo">
                                <div class="spinner">
                                    <div class="rect1"></div>
                                    <div class="rect2"></div>
                                    <div class="rect3"></div>
                                    <div class="rect4"></div>
                                    <div class="rect5"></div>
                                </div>
                            </div>
                            <input wire:model="profile_photo" type='file' class="hidden" />
                            @if (!is_string($profile_photo) && !is_null($profile_photo))
                                Poto Preview:
                                <img style="height: 100px !important;" src="{{ $profile_photo->temporaryUrl() }}">
                            @else
                                <svg class="w-10 h-10 mt-3 text-purple-400 group-hover:text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                <p class='lowercase text-sm text-gray-400 group-hover:text-purple-600 pt-1 tracking-wider'>Select a photo</p>
                            @endif
                            @error('profile_photo') <span class="error text-red-500 text-xs">{{ $message }} !</span> @enderror
                        </div>
                    </label>
                </div>
            </div>
        @endif

        <div class="parent-input grid grid-cols-1 mt-4 mx-7">
            <label class="uppercase md:text-sm text-xs text-gray-700 font-semibold">Country</label>
            <input wire:model="country" class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" type="text" placeholder="Your Country.." />
            @error('country') <span class="error text-red-500 text-xs">{{ $message }} !</span> @enderror
        </div>

        <div class="parent-input grid grid-cols-1 mt-4 mx-7">
            <label class="uppercase md:text-sm text-xs text-gray-700 font-semibold">Spesific Address</label>
            <input wire:model="address" class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" type="text" placeholder="Your Address.." />
            @error('address') <span class="error text-red-500 text-xs">{{ $message }} !</span> @enderror
        </div>

        <div class="parent-input grid grid-cols-1 mt-4 mx-7">
            <label class="uppercase md:text-sm text-xs text-gray-700 font-semibold">Proffession</label>
            <input wire:model="proffession" class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" type="text" placeholder="Your proffessions are.." />
            @error('proffession') <span class="error text-red-500 text-xs">{{ $message }} !</span> @enderror
        </div>

        <div class="parent-input grid grid-cols-1 mt-4 mx-7">
            <label class="uppercase md:text-sm text-xs text-gray-700 font-semibold">About Me</label>
            <textarea wire:model="about_me" class="py-2 h-28 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" type="text" placeholder="Describe all about you"></textarea>
            @error('about_me') <span class="error text-red-500 text-xs">{{ $message }} !</span> @enderror
        </div>

        <div class="parent-input grid grid-cols-1 md:grid-cols-2 gap-5 md:gap-8 mt-5 mx-7">
            <div class="grid grid-cols-1">
                <label class="uppercase md:text-sm text-xs text-gray-700 font-semibold">Email</label>
                <input wire:model="email" class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" type="text" placeholder="Youremail@example.com" />
                @error('email') <span class="error text-red-500 text-xs">{{ $message }} !</span> @enderror
            </div>
            <div class="grid grid-cols-1">
                <label class="uppercase md:text-sm text-xs text-gray-700 font-semibold">Whats App Number</label>
                <input wire:model="whatsapp" class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" type="text" placeholder="Example +62.." />
            </div>
        </div>

        <div class="parent-input grid grid-cols-1 md:grid-cols-2 gap-5 md:gap-8 mt-5 mx-7">
            <div class="grid grid-cols-1">
                <label class="uppercase md:text-sm text-xs text-gray-700 font-semibold">Instagram Link(optional)</label>
                <input wire:model="instagram" class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" type="text" placeholder="https://..." />
            </div>
            <div class="grid grid-cols-1">
                <label class="uppercase md:text-sm text-xs text-gray-700 font-semibold">Facebook Link(optional)</label>
                <input wire:model="facebook" class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" type="text" placeholder="https://..." />
            </div>
        </div>

        <div class="parent-input grid grid-cols-1 md:grid-cols-2 gap-5 md:gap-8 mt-5 mx-7">
            <div class="grid grid-cols-1">
                <label class="uppercase md:text-sm text-xs text-gray-700 font-semibold">Twitter Link(optional)</label>
                <input wire:model="twitter" class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" type="text" placeholder="https://..." />
            </div>
            <div class="grid grid-cols-1">
                <label class="uppercase md:text-sm text-xs text-gray-700 font-semibold">LinkedIn Link(optional)</label>
                <input wire:model="linkedin" class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" type="text" placeholder="https://..." />
            </div>
        </div>

        <div class="parent-input grid grid-cols-1 md:grid-cols-2 gap-5 md:gap-8 mt-5 mx-7">
            <div class="grid grid-cols-1">
                <label class="uppercase md:text-sm text-xs text-gray-700 font-semibold">Youtube Link(optional)</label>
                <input wire:model="youtube" class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" type="text" placeholder="https://..." />
            </div>
            <div class="grid grid-cols-1">
                <label class="uppercase md:text-sm text-xs text-gray-700 font-semibold">Tiktok Link(optional)</label>
                <input wire:model="tiktok" class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" type="text" placeholder="https://..." />
            </div>
        </div>

        {{-- <div class="parent-input grid grid-cols-1 mt-5 mx-7">
            <label class="uppercase md:text-sm text-xs text-gray-700 font-semibold mb-1">Upload Photo For Your Gallery(One Or Many and Optional)</label>
            <div class='flex items-center justify-center w-full'>
                <label class='flex flex-col border-4 border-dashed w-full h-32 hover:bg-gray-100 hover:border-purple-300 group'>
                    <div class='flex flex-col h-32 items-center justify-center'>
                        <svg class="mt-3 w-10 h-10 text-purple-400 group-hover:text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                        <p class='lowercase text-sm text-gray-400 group-hover:text-purple-600 pt-1 tracking-wider'>Select a photo</p>
                    </div>
                    <input wire:model="gallery_photo" type='file' class="hidden" multiple/>
                </label>
            </div>
        </div> --}}

        <div class='flex items-center justify-center  md:gap-8 gap-4 pt-5 pb-5'>
            <button wire:click="reset()" class='w-auto bg-gray-500 hover:bg-gray-700 rounded-lg shadow-xl font-medium text-white px-4 py-2'>Reset</button>
            <button wire:click="saveOrUpdate()" class='bg-gradient-primary w-auto hover:bg-purple-700 rounded-lg shadow-xl font-medium text-white px-4 py-2'>Save</button>
        </div>
    </div>

    @if($this->alert_success)
        <x-jet-banner />
    @endif

</div>
