<div class="min-h-screen">
    <div class="row">
        <div class="col-12">
            <script src="https://cdn.jsdelivr.net/npm/@ryangjchandler/alpine-clipboard@2.x.x/dist/alpine-clipboard.js" defer>
            </script>
            <x-slot name="search">
                <input value="sdfsdf" type="search" wire:model="search" class="form-control" placeholder="Search here...">
            </x-slot>
            <div class="flex flex-col items-center min-h-screen bg-center bg-cover">
                <h1 class="text-3xl">See Your Card</h1>
                @if (Auth::User()->limit > 100)
                    <h6 class="text-6xl">Card Limit INFINITY</h6>
                @else
                    <h6 class="text-6xl">Card Limit {{ Auth::User()->limit }}</h6>
                @endif
                @if ($mycard->count() > 0)
                    <div class="w-full mx-auto z-10">
                        @foreach ($mycard as $data)
                            <!-- defualt theme -->
                            <div x-data="{ isOpen: false }" class="default-theme w-full mx-auto z-10 relative">
                                <div @click="isOpen = !isOpen" @keydown.escape="isOpen = false"
                                    class="top-right-icon absolute top-12 right-10 rounded-full transition cursor-pointer ease-in duration-300 hover:bg-purple-300 focus:bg-purple-500 active:bg-purple-500 focus:ring">
                                    <svg style="width:24px;height:24px" viewBox="0 0 24 24">
                                        <path fill="currentColor"
                                            d="M12,16A2,2 0 0,1 14,18A2,2 0 0,1 12,20A2,2 0 0,1 10,18A2,2 0 0,1 12,16M12,10A2,2 0 0,1 14,12A2,2 0 0,1 12,14A2,2 0 0,1 10,12A2,2 0 0,1 12,10M12,4A2,2 0 0,1 14,6A2,2 0 0,1 12,8A2,2 0 0,1 10,6A2,2 0 0,1 12,4Z" />
                                    </svg>
                                </div>
                                <ul x-show="isOpen" @click.away="isOpen = false"
                                    class="absolute p-0 z-70 font-normal bg-white shadow overflow-hidden rounded w-48 border mt-5 right-16 z-20">
                                    <li @click="isOpen = !isOpen" @keydown.escape="isOpen = false">
                                        <a x-data="{ input: '{{ asset('/show-card/' . $data->id) }}' }"
                                            class="cursor-pointer flex items-center px-3 py-3 hover:bg-gray-200">
                                            <button class="flex" type="button" @click="$clipboard(input)">
                                                <input type="hidden" x-model="input">
                                                <svg class="mr-2" style="width:24px;height:24px" viewBox="0 0 24 24">
                                                    <path fill="currentColor"
                                                        d="M19,21H8V7H19M19,5H8A2,2 0 0,0 6,7V21A2,2 0 0,0 8,23H19A2,2 0 0,0 21,21V7A2,2 0 0,0 19,5M16,1H4A2,2 0 0,0 2,3V17H4V3H16V1Z" />
                                                </svg>
                                                Copy
                                            </button>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="flex items-center px-3 py-3 hover:bg-gray-200"
                                            x-data="{ isOpenDelete: false }">
                                            <svg style="width:24px;height:24px" viewBox="0 0 24 24">
                                                <path fill="currentColor"
                                                    d="M4 19V7H16V19C16 20.1 15.1 21 14 21H6C4.9 21 4 20.1 4 19M6 9V19H14V9H6M13.5 4H17V6H3V4H6.5L7.5 3H12.5L13.5 4M19 17V15H21V17H19M19 13V7H21V13H19Z" />
                                            </svg>
                                            <span class="ml-2 cursor-pointer" @click="isOpenDelete = !isOpenDelete"
                                                @keydown.escape="isOpenDelete = false">delete</span>
                                            <div x-show="isOpenDelete" @click.away="isOpenDelete = false"
                                                class="flex items-center absolute top-0  right-0 left-0 bottom-0">
                                                <div class="px-3 py-4 h-full w-full bg-white rounded-xl">
                                                    <h1 class="text-lg text-center py-3">Are You Sure?</h1>
                                                    <div class="flex text-xs">
                                                        <button class="btn bg-gradient-primary text-xs"
                                                            @click="isOpenDelete = !isOpenDelete"
                                                            @keydown.escape="isOpenDelete = false"
                                                            wire:click="delete({{ $data->id }})">Yes</button>
                                                        <button class="btn bg-gradient-secondary text-xs"
                                                            @click="isOpenDelete = !isOpenDelete"
                                                            @keydown.escape="isOpenDelete = false">Cancel</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="/dashboard/edite-card/{{ $data->id }}"
                                            class="flex items-center px-3 py-3 hover:bg-gray-200">
                                            <svg style="width:24px;height:24px" viewBox="0 0 24 24">
                                                <path fill="currentColor"
                                                    d="M19,19V5H5V19H19M19,3A2,2 0 0,1 21,5V19C21,20.11 20.1,21 19,21H5A2,2 0 0,1 3,19V5A2,2 0 0,1 5,3H19M16.7,9.35L15.7,10.35L13.65,8.3L14.65,7.3C14.86,7.08 15.21,7.08 15.42,7.3L16.7,8.58C16.92,8.79 16.92,9.14 16.7,9.35M7,14.94L13.06,8.88L15.12,10.94L9.06,17H7V14.94Z" />
                                            </svg>
                                            <span class="ml-2">edite</span>
                                        </a>
                                    </li>
                                </ul>
                                <div class="flex flex-col">
                                    <div class="bg-white border border-white shadow-lg  rounded-3xl p-4 m-4">
                                        <div class="flex-none sm:flex items-center justify-center">
                                            <div
                                                class="relative mx-auto h-32 w-32 text-center md:text-left sm:mb-0 mb-3">
                                                <img src="{{ asset('storage/profile_photos/' . $data->profile_photo) }}"
                                                    alt="profile" class="w-32 h-32 object-cover rounded-2xl">
                                                <a href="#"
                                                    class="absolute -right-2 bottom-2   -ml-3  text-white p-1 text-xs bg-green-400 hover:bg-green-500 font-medium tracking-wider rounded-full transition ease-in duration-300">
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                                        fill="currentColor" class="h-4 w-4">
                                                        <path
                                                            d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z">
                                                        </path>
                                                    </svg>
                                                </a>
                                            </div>
                                            <div class="flex-auto sm:ml-5 justify-evenly">
                                                <div class="flex items-center justify-between sm:mt-2">
                                                    <div class="flex items-center">
                                                        <div class="flex flex-col">
                                                            <div
                                                                class="w-full flex-none text-lg text-gray-800 font-bold leading-none">
                                                                {{ $data->name }}</div>
                                                            <div class="flex-auto text-gray-500 my-1">
                                                                <span
                                                                    class="mr-3 block md:inline font-bold">{{ $data->proffession }}</span>
                                                                <span
                                                                    class="mr-3 hidden md:block border-r border-gray-200  max-h-0"></span>
                                                                <span>{{ $data->address }}</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div>
                                                    <p>{{ Str::substr($data->about_me, 0, 70) }}....</p>
                                                </div>
                                                <div
                                                    class="flex flex-col items-center md:flex-row pt-2 text-sm text-gray-500 ">
                                                    <div class="flex-1 text-center inline-flex items-center ">
                                                        <i class="far fa-envelope  mr-2"></i>
                                                        <p class="text-center m-0">{{ $data->email }}</p>
                                                    </div>
                                                    <a href="/show-card/{{ $data->id }}" target="_blank"
                                                        class="w-full md:w-auto text-center flex-no-shrink bg-gradient-primary hover:bg-green-500 px-5 ml-4 py-2 text-xs shadow-sm hover:shadow-lg font-medium tracking-wider border-2 border-green-300 hover:border-green-500 text-white rounded-full transition ease-in duration-300">
                                                        View
                                                    </a>
                                                    <a href="/show-qrcode/{{ $data->id }}" target="_blank"
                                                        class="text-nowrap w-full md:w-auto text-center flex-no-shrink bg-gradient-primary hover:bg-green-500 px-5 ml-4 py-2 text-xs shadow-sm hover:shadow-lg font-medium tracking-wider border-2 border-green-300 hover:border-green-500 text-white rounded-full transition ease-in duration-300">
                                                        View QR
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="min-h-screen -mt-24 flex items-center justify-center">
                        <h6 class="mr-3">You dont have a Card</h6>
                        <a href="create-card">
                            <div class="btn btn-primary">Lets Create</div>
                        </a>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
