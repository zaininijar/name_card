<div class="min-h-screen">
    <div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header pb-0">
              <h6>All Card</h6>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Name</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Proffession</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Mulai</th>
                      <th class="text-secondary opacity-7"></th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($cards as $card)
                        <tr>
                            <td>
                            <div class="d-flex px-2 py-1">
                                <div>
                                    @if ($card->profile_photo !== NULL)
                                        <img style="min-width: 17px !important;" src="{{ asset('storage/profile_photos/' . $card->profile_photo) }}" class="avatar avatar-sm me-3" alt="{{ $card->user->name }}">
                                    @else
                                        <img src="{{ asset('dashboard_template') }}/assets/img/team-2.jpg" class="avatar avatar-sm me-3" alt="user1">
                                    @endif
                                </div>
                                <div class="d-flex flex-column justify-content-center">
                                    <h6 class="mb-0 text-sm">{{ $card->name }}</h6>
                                    <p class="text-xs text-secondary mb-0">{{ $card->user->name }}</p>
                                </div>
                            </div>
                            </td>
                            <td>
                                <p class="text-xs font-weight-bold mb-0">{{ $card->proffession }}</p>
                                <p class="text-xs text-secondary mb-0">{{ $card->email }}</p>
                            </td>
                            <td class="align-middle text-center text-sm">
                                <span class="badge badge-sm bg-gradient-success">activated</span>
                            </td>
                            <td class="align-middle text-center">
                                <span class="text-secondary text-xs font-weight-bold">{{ $card->created_at}}</span>
                            </td>
                            <td class="align-middle">
                                <div class="" x-data="{ isOpen: false}">
                                    <button @click="isOpen = !isOpen" @keydown.escape="isOpen = false" class="flex items-center">
                                        <svg style="width:24px;height:24px" viewBox="0 0 24 24">
                                            <path fill="currentColor" d="M12,16A2,2 0 0,1 14,18A2,2 0 0,1 12,20A2,2 0 0,1 10,18A2,2 0 0,1 12,16M12,10A2,2 0 0,1 14,12A2,2 0 0,1 12,14A2,2 0 0,1 10,12A2,2 0 0,1 12,10M12,4A2,2 0 0,1 14,6A2,2 0 0,1 12,8A2,2 0 0,1 10,6A2,2 0 0,1 12,4Z" />
                                        </svg>
                                    </button>
                                    <ul x-show="isOpen" @click.away="isOpen = false" class="absolute p-0 z-70 font-normal bg-white shadow overflow-hidden rounded w-48 border mt-2 py-1 right-0 z-20">
                                        <li>
                                            <a href="/show-card/{{ $card->id }}" target="_blank" class="flex items-center px-3 py-3 hover:bg-gray-200">
                                                <svg style="width:24px;height:24px" viewBox="0 0 24 24">
                                                    <path fill="currentColor" d="M12,9A3,3 0 0,1 15,12A3,3 0 0,1 12,15A3,3 0 0,1 9,12A3,3 0 0,1 12,9M12,4.5C17,4.5 21.27,7.61 23,12C21.27,16.39 17,19.5 12,19.5C7,19.5 2.73,16.39 1,12C2.73,7.61 7,4.5 12,4.5M3.18,12C4.83,15.36 8.24,17.5 12,17.5C15.76,17.5 19.17,15.36 20.82,12C19.17,8.64 15.76,6.5 12,6.5C8.24,6.5 4.83,8.64 3.18,12Z" />
                                                </svg>
                                                <span class="ml-2">view</span>
                                            </a>
                                        </li>
                                        <li class="border-b border-gray-400">
                                            <a href="/dashboard/edite-card/{{ $card->id }}" class="flex items-center px-3 py-3 hover:bg-gray-200">
                                                <svg style="width:24px;height:24px" viewBox="0 0 24 24">
                                                    <path fill="currentColor" d="M19,19V5H5V19H19M19,3A2,2 0 0,1 21,5V19C21,20.11 20.1,21 19,21H5A2,2 0 0,1 3,19V5A2,2 0 0,1 5,3H19M16.7,9.35L15.7,10.35L13.65,8.3L14.65,7.3C14.86,7.08 15.21,7.08 15.42,7.3L16.7,8.58C16.92,8.79 16.92,9.14 16.7,9.35M7,14.94L13.06,8.88L15.12,10.94L9.06,17H7V14.94Z" />
                                                </svg>
                                                <span class="ml-2">edite</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a class="flex items-center px-3 py-3 hover:bg-gray-200" x-data="{ isOpenDelete: false}">
                                                <svg style="width:24px;height:24px" viewBox="0 0 24 24">
                                                    <path fill="currentColor" d="M4 19V7H16V19C16 20.1 15.1 21 14 21H6C4.9 21 4 20.1 4 19M6 9V19H14V9H6M13.5 4H17V6H3V4H6.5L7.5 3H12.5L13.5 4M19 17V15H21V17H19M19 13V7H21V13H19Z" />
                                                </svg>
                                                <span class="ml-2 cursor-pointer" @click="isOpenDelete = !isOpenDelete" @keydown.escape="isOpenDelete = false">delete</span>
                                                <div x-show="isOpenDelete" @click.away="isOpenDelete = false" class="flex items-center absolute top-0  right-0 left-0 bottom-0">
                                                    <div class="px-3 py-4 h-full w-full bg-white rounded-xl">
                                                        <h1 class="text-lg text-center py-3">Are You Sure?</h1>
                                                        <button class="btn bg-gradient-primary text-xs" @click="isOpenDelete = !isOpenDelete" @keydown.escape="isOpenDelete = false" wire:click="delete({{ $card->id }})">Yes</button>
                                                        <button class="btn bg-gradient-secondary text-xs" @click="isOpenDelete = !isOpenDelete" @keydown.escape="isOpenDelete = false">Cancel</button>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                  </tbody>
                </table>

                {{ $cards->links() }}

              </div>
            </div>
          </div>
        </div>
    </div>
</div>
