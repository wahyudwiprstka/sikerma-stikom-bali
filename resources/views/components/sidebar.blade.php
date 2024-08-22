<aside id="logo-sidebar"
    class="fixed top-0 left-0 w-64 h-screen pt-24  transition-transform -translate-x-full bg-white border-r border-gray-200 sm:translate-x-0 dark:border-gray-700"
    aria-label="Sidebar">
    <div class="h-full px-3 pb-4 overflow-y-auto bg-white">
        <ul class="space-y-2 font-medium">

            {{-- Dashboard --}}
            <li>
                <a href="/"
                    class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                    <svg class="w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 21">
                        <path
                            d="M16.975 11H10V4.025a1 1 0 0 0-1.066-.998 8.5 8.5 0 1 0 9.039 9.039.999.999 0 0 0-1-1.066h.002Z" />
                        <path
                            d="M12.5 0c-.157 0-.311.01-.565.027A1 1 0 0 0 11 1.02V10h8.975a1 1 0 0 0 1-.935c.013-.188.028-.374.028-.565A8.51 8.51 0 0 0 12.5 0Z" />
                    </svg>
                    <span class="ml-3">Dashboard</span>
                </a>
            </li>

            {{-- Kerjasama (Admin) --}}
            @can('admin')
                <li>
                    <button type="button"
                        class="flex items-center w-full p-2 text-base text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700"
                        aria-controls="dropdown-kerjasama" data-collapse-toggle="dropdown-kerjasama">
                        <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white"
                            aria-controls="dropdown-kerjasama" data-collapse-toggle="dropdown-kerjasama" fill="currentColor"
                            viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg">

                            <path class="st0"
                                d="m255.37 141.05c-7.4 3.583-14.732 8.548-21.533 15.357-34.091 34.098-65.081 65.088-65.081 65.088l0.013 0.02c-0.185 0.186-0.371 0.338-0.557 0.53-8.824 8.831-9.174 22.909-1.025 32.146 0.323 0.371 0.668 0.736 1.025 1.086 9.161 9.174 24.036 9.196 33.232 0l35.797-35.797c6.176 2.263 12.248 3.583 18.074 4.243 7.937 0.88 15.392 0.55 22.022-0.385 16.162-2.29 14.47-1.623 23.844-4.704 9.353-3.068 19.862-9.354 19.862-9.354l6.362 6.355c0.701 0.681 16.919 16.925 25.192 25.185 1.465 1.471 2.709 2.682 3.542 3.549 0.956 0.997 2.022 1.719 2.682 2.682l41.278 41.279c11.898-13.35 25.488-33.232 23.81-56.058l-103.14-103.13s-35.701-2.551-65.397 11.906z" />
                            <path class="st0"
                                d="m261.12 394.36c-9.134-9.147-23.961-9.147-33.101 0l-6.794 6.794c9.119-9.132 9.112-23.926-0.021-33.066-9.14-9.126-23.947-9.126-33.087 7e-3 9.14-9.133 9.14-23.94 0-33.087-9.133-9.148-23.947-9.133-33.087 0 9.14-9.133 9.14-23.947 0-33.095-9.134-9.132-23.947-9.132-33.088 0.014l-20.46 20.453c-9.14 9.147-9.14 23.947 0 33.094 9.133 9.134 23.941 9.134 33.08 0-9.14 9.134-9.14 23.947 0 33.087 9.147 9.133 23.954 9.133 33.094 0-9.14 9.133-9.14 23.941 0 33.088 9.14 9.133 23.947 9.133 33.088 0l6.802-6.809c-9.119 9.147-9.113 23.94 0.02 33.081 9.14 9.132 23.947 9.132 33.088 0l20.467-20.468c9.132-9.153 9.132-23.96-1e-3 -33.093z" />
                            <path class="st0"
                                d="m507.99 178.28-120.44-120.46c-5.351-5.337-14.002-5.337-19.339 0l-38.631 38.63c-5.337 5.337-5.337 13.989 0 19.333l120.46 120.45c5.33 5.35 13.996 5.35 19.326 0l38.63-38.638c5.351-5.322 5.351-13.974 0-19.318zm-34.332 26.712c-5.75 5.736-15.048 5.736-20.777 0-5.735-5.743-5.735-15.041 0-20.777 5.729-5.736 15.027-5.736 20.777 0 5.736 5.736 5.729 15.034 0 20.777z" />
                            <path class="st0"
                                d="m182.42 99.864-38.624-38.63c-5.336-5.337-13.995-5.337-19.332 0l-120.46 120.46c-5.337 5.323-5.337 13.989 0 19.319l38.631 38.644c5.33 5.331 14.002 5.331 19.325 0l120.46-120.46c5.344-5.337 5.344-13.989 0-19.332zm-123.3 108.54c-5.736 5.729-15.04 5.729-20.777 0-5.735-5.742-5.735-15.041 0-20.777 5.736-5.735 15.041-5.735 20.777 0 5.736 5.736 5.736 15.034 0 20.777z" />
                            <path class="st0"
                                d="m397.53 312.81-7.468-7.482-72.509-72.509-4.883 2.166-5.316 1.919-0.384 0.117c-0.936 0.296-9.684 2.971-26.932 5.412-9.12 1.273-18.156 1.431-26.904 0.434-3.459-0.385-6.898-0.95-10.296-1.692l-27.757 27.744c-16.678 16.678-43.836 16.678-60.514 0-0.585-0.591-1.149-1.19-1.671-1.781l-0.179-0.2c-10.529-11.939-13.204-28.28-8.252-42.461l10.673-16.609-0.02-0.02 65.081-65.074c2.647-2.641 5.426-5.103 8.314-7.428-20.281-3.982-37.296-2.806-37.296-2.806l-103.12 103.14c-1.389 18.988 11.651 39.799 20.928 51.952 16.692-15.963 43.239-15.756 59.641 0.654 6.107 6.1 9.952 13.617 11.574 21.498 7.895 1.637 15.406 5.475 21.513 11.582 6.107 6.114 9.952 13.631 11.575 21.519 7.888 1.623 15.412 5.46 21.513 11.568 4.078 4.078 7.152 8.783 9.222 13.817 11.1-0.137 22.242 4.016 30.688 12.455 16.65 16.636 16.643 43.733 0 60.363l-6.809 6.822 3.411 3.412c9.148 9.147 23.954 9.147 33.095 0 9.14-9.134 9.14-23.947 0-33.088l6.808 6.83c9.147 9.133 23.947 9.133 33.087 0 9.14-9.147 9.147-23.954 0-33.101 9.147 9.147 23.947 9.147 33.087 0 9.134-9.126 9.154-23.94 0-33.088 9.154 9.148 23.954 9.148 33.088 0 9.147-9.132 9.147-23.947 0-33.08l-12.986-12.985z" />

                        </svg>

                        <span class="flex-1 ml-3 text-left whitespace-nowrap">Kerjasama</span>
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 4 4 4-4" />
                        </svg>
                    </button>
                    <ul id="dropdown-kerjasama" class="hidden py-2 space-y-2">
                        <li>
                            <a href="/kerjasama"
                                class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">List
                                Kerjasama</a>
                        </li>
                        <li>
                            <a href="/kerjasama/create"
                                class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Tambah
                                Kerjasama</a>
                        </li>
                        <li>
                            <a href="/kerjasama/hampir-kadaluarsa"
                                class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Kerjasama
                                Kadaluarsa</a>
                        </li>
                    </ul>
                </li>
            @endcan

            {{-- Kerjasama (User) --}}
            @can('user')
                <li>
                    <a href="/kerjasama"
                        class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                        <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white"fill="currentColor"
                            viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg">

                            <path class="st0"
                                d="m255.37 141.05c-7.4 3.583-14.732 8.548-21.533 15.357-34.091 34.098-65.081 65.088-65.081 65.088l0.013 0.02c-0.185 0.186-0.371 0.338-0.557 0.53-8.824 8.831-9.174 22.909-1.025 32.146 0.323 0.371 0.668 0.736 1.025 1.086 9.161 9.174 24.036 9.196 33.232 0l35.797-35.797c6.176 2.263 12.248 3.583 18.074 4.243 7.937 0.88 15.392 0.55 22.022-0.385 16.162-2.29 14.47-1.623 23.844-4.704 9.353-3.068 19.862-9.354 19.862-9.354l6.362 6.355c0.701 0.681 16.919 16.925 25.192 25.185 1.465 1.471 2.709 2.682 3.542 3.549 0.956 0.997 2.022 1.719 2.682 2.682l41.278 41.279c11.898-13.35 25.488-33.232 23.81-56.058l-103.14-103.13s-35.701-2.551-65.397 11.906z" />
                            <path class="st0"
                                d="m261.12 394.36c-9.134-9.147-23.961-9.147-33.101 0l-6.794 6.794c9.119-9.132 9.112-23.926-0.021-33.066-9.14-9.126-23.947-9.126-33.087 7e-3 9.14-9.133 9.14-23.94 0-33.087-9.133-9.148-23.947-9.133-33.087 0 9.14-9.133 9.14-23.947 0-33.095-9.134-9.132-23.947-9.132-33.088 0.014l-20.46 20.453c-9.14 9.147-9.14 23.947 0 33.094 9.133 9.134 23.941 9.134 33.08 0-9.14 9.134-9.14 23.947 0 33.087 9.147 9.133 23.954 9.133 33.094 0-9.14 9.133-9.14 23.941 0 33.088 9.14 9.133 23.947 9.133 33.088 0l6.802-6.809c-9.119 9.147-9.113 23.94 0.02 33.081 9.14 9.132 23.947 9.132 33.088 0l20.467-20.468c9.132-9.153 9.132-23.96-1e-3 -33.093z" />
                            <path class="st0"
                                d="m507.99 178.28-120.44-120.46c-5.351-5.337-14.002-5.337-19.339 0l-38.631 38.63c-5.337 5.337-5.337 13.989 0 19.333l120.46 120.45c5.33 5.35 13.996 5.35 19.326 0l38.63-38.638c5.351-5.322 5.351-13.974 0-19.318zm-34.332 26.712c-5.75 5.736-15.048 5.736-20.777 0-5.735-5.743-5.735-15.041 0-20.777 5.729-5.736 15.027-5.736 20.777 0 5.736 5.736 5.729 15.034 0 20.777z" />
                            <path class="st0"
                                d="m182.42 99.864-38.624-38.63c-5.336-5.337-13.995-5.337-19.332 0l-120.46 120.46c-5.337 5.323-5.337 13.989 0 19.319l38.631 38.644c5.33 5.331 14.002 5.331 19.325 0l120.46-120.46c5.344-5.337 5.344-13.989 0-19.332zm-123.3 108.54c-5.736 5.729-15.04 5.729-20.777 0-5.735-5.742-5.735-15.041 0-20.777 5.736-5.735 15.041-5.735 20.777 0 5.736 5.736 5.736 15.034 0 20.777z" />
                            <path class="st0"
                                d="m397.53 312.81-7.468-7.482-72.509-72.509-4.883 2.166-5.316 1.919-0.384 0.117c-0.936 0.296-9.684 2.971-26.932 5.412-9.12 1.273-18.156 1.431-26.904 0.434-3.459-0.385-6.898-0.95-10.296-1.692l-27.757 27.744c-16.678 16.678-43.836 16.678-60.514 0-0.585-0.591-1.149-1.19-1.671-1.781l-0.179-0.2c-10.529-11.939-13.204-28.28-8.252-42.461l10.673-16.609-0.02-0.02 65.081-65.074c2.647-2.641 5.426-5.103 8.314-7.428-20.281-3.982-37.296-2.806-37.296-2.806l-103.12 103.14c-1.389 18.988 11.651 39.799 20.928 51.952 16.692-15.963 43.239-15.756 59.641 0.654 6.107 6.1 9.952 13.617 11.574 21.498 7.895 1.637 15.406 5.475 21.513 11.582 6.107 6.114 9.952 13.631 11.575 21.519 7.888 1.623 15.412 5.46 21.513 11.568 4.078 4.078 7.152 8.783 9.222 13.817 11.1-0.137 22.242 4.016 30.688 12.455 16.65 16.636 16.643 43.733 0 60.363l-6.809 6.822 3.411 3.412c9.148 9.147 23.954 9.147 33.095 0 9.14-9.134 9.14-23.947 0-33.088l6.808 6.83c9.147 9.133 23.947 9.133 33.087 0 9.14-9.147 9.147-23.954 0-33.101 9.147 9.147 23.947 9.147 33.087 0 9.134-9.126 9.154-23.94 0-33.088 9.154 9.148 23.954 9.148 33.088 0 9.147-9.132 9.147-23.947 0-33.08l-12.986-12.985z" />

                        </svg>
                        <span class="flex-1 ml-3 whitespace-nowrap">Kerjasama</span>
                    </a>
                </li>
            @endcan

            {{-- Mitra (Admin) --}}
            @can('admin')
                <li>
                    <button type="button"
                        class="flex items-center w-full p-2 text-base text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700"
                        aria-controls="dropdown-mitra" data-collapse-toggle="dropdown-mitra">
                        <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white"
                            aria-controls="dropdown-mitra" data-collapse-toggle="dropdown-mitra" fill="currentColor"
                            viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="m256.5 96.434c26.632 0 48.213-21.597 48.213-48.205 0-26.649-21.58-48.229-48.213-48.229-26.65 0-48.222 21.58-48.222 48.229 1e-3 26.608 21.573 48.205 48.222 48.205z" />
                            <path
                                d="m298.27 119.28h-84.542c-23.362 0-48.779 25.418-48.779 48.788v162.06c0 11.685 9.463 21.156 21.148 21.156h14.756l8.048 138.21c0 12.434 10.078 22.513 22.513 22.513h24.585 24.593c12.434 0 22.513-10.078 22.513-22.513l8.04-138.21h14.764c11.676 0 21.148-9.471 21.148-21.156v-162.06c0-23.37-25.418-48.788-48.787-48.788z" />
                            <path
                                d="m104.14 149.08c23.262 0 42.105-18.85 42.105-42.104 0-23.262-18.843-42.112-42.105-42.112-23.27 0-42.104 18.851-42.104 42.112 0 23.253 18.834 42.104 42.104 42.104z" />
                            <path
                                d="m408.72 149.08c23.27 0 42.104-18.85 42.104-42.104 0-23.262-18.834-42.112-42.104-42.112-23.253 0-42.104 18.851-42.104 42.112 0 23.253 18.851 42.104 42.104 42.104z" />
                            <path
                                d="m137.26 169.02h-70.468c-20.398 0-42.595 22.213-42.595 42.612v141.53c0 10.212 8.264 18.476 18.468 18.476h12.884l7.024 120.7c0 10.852 8.805 19.658 19.666 19.658h21.473 21.472c10.861 0 19.666-8.805 19.666-19.658l7.016-120.7v-6.849c-8.98-8.856-14.606-21.082-14.606-34.664v-161.1z" />
                            <path
                                d="m445.21 169.02h-70.468v161.1c0 13.582-5.626 25.808-14.615 34.664v6.849l7.017 120.7c0 10.852 8.814 19.658 19.674 19.658h21.464 21.481c10.862 0 19.659-8.805 19.659-19.658l7.032-120.7h12.883c10.204 0 18.468-8.265 18.468-18.476v-141.53c0-20.399-22.196-42.612-42.595-42.612z" />
                        </svg>
                        <span class="flex-1 ml-3 text-left whitespace-nowrap">Mitra</span>
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 4 4 4-4" />
                        </svg>
                    </button>
                    <ul id="dropdown-mitra" class="hidden py-2 space-y-2">
                        <li>
                            <a href="/mitra"
                                class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">List
                                Mitra</a>
                        </li>
                        <li>
                            <a href="/mitra/create"
                                class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Tambah
                                Mitra</a>
                        </li>
                        <li>
                            <a href="/mitra/klasifikasi"
                                class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Klasifikasi
                                Mitra</a>
                        </li>
                        <li>
                            <a href="/mitra/add-klasifikasi"
                                class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Tambah
                                Klasifikasi Mitra</a>
                        </li>
                    </ul>
                </li>
            @endcan

            {{-- Mitra (User) --}}
            @can('user')
                <li>
                    <a href="/mitra"
                        class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                        <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white"
                            fill="currentColor" viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="m256.5 96.434c26.632 0 48.213-21.597 48.213-48.205 0-26.649-21.58-48.229-48.213-48.229-26.65 0-48.222 21.58-48.222 48.229 1e-3 26.608 21.573 48.205 48.222 48.205z" />
                            <path
                                d="m298.27 119.28h-84.542c-23.362 0-48.779 25.418-48.779 48.788v162.06c0 11.685 9.463 21.156 21.148 21.156h14.756l8.048 138.21c0 12.434 10.078 22.513 22.513 22.513h24.585 24.593c12.434 0 22.513-10.078 22.513-22.513l8.04-138.21h14.764c11.676 0 21.148-9.471 21.148-21.156v-162.06c0-23.37-25.418-48.788-48.787-48.788z" />
                            <path
                                d="m104.14 149.08c23.262 0 42.105-18.85 42.105-42.104 0-23.262-18.843-42.112-42.105-42.112-23.27 0-42.104 18.851-42.104 42.112 0 23.253 18.834 42.104 42.104 42.104z" />
                            <path
                                d="m408.72 149.08c23.27 0 42.104-18.85 42.104-42.104 0-23.262-18.834-42.112-42.104-42.112-23.253 0-42.104 18.851-42.104 42.112 0 23.253 18.851 42.104 42.104 42.104z" />
                            <path
                                d="m137.26 169.02h-70.468c-20.398 0-42.595 22.213-42.595 42.612v141.53c0 10.212 8.264 18.476 18.468 18.476h12.884l7.024 120.7c0 10.852 8.805 19.658 19.666 19.658h21.473 21.472c10.861 0 19.666-8.805 19.666-19.658l7.016-120.7v-6.849c-8.98-8.856-14.606-21.082-14.606-34.664v-161.1z" />
                            <path
                                d="m445.21 169.02h-70.468v161.1c0 13.582-5.626 25.808-14.615 34.664v6.849l7.017 120.7c0 10.852 8.814 19.658 19.674 19.658h21.464 21.481c10.862 0 19.659-8.805 19.659-19.658l7.032-120.7h12.883c10.204 0 18.468-8.265 18.468-18.476v-141.53c0-20.399-22.196-42.612-42.595-42.612z" />
                        </svg>
                        <span class="ml-3">Mitra</span>
                    </a>
                </li>
            @endcan

            {{-- Bagian (Admin) --}}
            @can('admin')
                <li>
                    <button type="button"
                        class="flex items-center w-full p-2 text-base text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700"
                        aria-controls="dropdown-bagian" data-collapse-toggle="dropdown-bagian">
                        <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white"
                            aria-controls="dropdown-bagian" data-collapse-toggle="dropdown-bagian" fill="currentColor"
                            viewBox="0 0 48 48" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M43,10H5a2.9,2.9,0,0,0-3,3V35a3,3,0,0,0,3,3H43a3,3,0,0,0,3-3V13A2.9,2.9,0,0,0,43,10ZM13,28a4,4,0,1,1,4-4A4,4,0,0,1,13,28Zm11,0a4,4,0,1,1,4-4A4,4,0,0,1,24,28Zm11,0a4,4,0,1,1,4-4A4,4,0,0,1,35,28Z" />
                        </svg>
                        <span class="flex-1 ml-3 text-left whitespace-nowrap">Bagian</span>
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 4 4 4-4" />
                        </svg>
                    </button>
                    <ul id="dropdown-bagian" class="hidden py-2 space-y-2">
                        <li>
                            <a href="/bagian"
                                class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">List
                                Bagian</a>
                        </li>
                        <li>
                            <a href="/bagian/create"
                                class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Tambah
                                Bagian</a>
                        </li>
                        <li>
                            <a href="/klasifikasi-bagian"
                                class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">List
                                Klasifikasi Bagian</a>
                        </li>
                        <li>
                            <a href="/klasifikasi-bagian/create"
                                class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Tambah
                                Klasifikasi
                                Bagian</a>
                        </li>
                    </ul>
                </li>
            @endcan

            {{-- Bagian (User) --}}
            @can('user')
                <li>
                    <a href="/bagian"
                        class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                        <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white"
                            fill="currentColor" viewBox="0 0 48 48" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M43,10H5a2.9,2.9,0,0,0-3,3V35a3,3,0,0,0,3,3H43a3,3,0,0,0,3-3V13A2.9,2.9,0,0,0,43,10ZM13,28a4,4,0,1,1,4-4A4,4,0,0,1,13,28Zm11,0a4,4,0,1,1,4-4A4,4,0,0,1,24,28Zm11,0a4,4,0,1,1,4-4A4,4,0,0,1,35,28Z" />
                        </svg>
                        <span class="ml-3">Bagian</span>
                    </a>
                </li>
            @endcan

            {{-- User --}}
            @can('admin')
                <li>
                    <button type="button"
                        class="flex items-center w-full p-2 text-base text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700"
                        aria-controls="dropdown-users" data-collapse-toggle="dropdown-users">
                        <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                            aria-controls="dropdown-users" data-collapse-toggle="dropdown-users" viewBox="0 0 20 18">
                            <path
                                d="M14 2a3.963 3.963 0 0 0-1.4.267 6.439 6.439 0 0 1-1.331 6.638A4 4 0 1 0 14 2Zm1 9h-1.264A6.957 6.957 0 0 1 15 15v2a2.97 2.97 0 0 1-.184 1H19a1 1 0 0 0 1-1v-1a5.006 5.006 0 0 0-5-5ZM6.5 9a4.5 4.5 0 1 0 0-9 4.5 4.5 0 0 0 0 9ZM8 10H5a5.006 5.006 0 0 0-5 5v2a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-2a5.006 5.006 0 0 0-5-5Z" />
                        </svg>
                        <span class="flex-1 ml-3 text-left whitespace-nowrap">Users</span>
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 4 4 4-4" />
                        </svg>
                    </button>
                    <ul id="dropdown-users" class="hidden py-2 space-y-2">
                        <li>
                            <a href="/users"
                                class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">List
                                User</a>
                        </li>
                        <li>
                            <a href="/users/request"
                                class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Request
                                User</a>
                        </li>
                    </ul>
                </li>
            @endcan

            {{-- Template Dokumen (Admin) --}}
            @can('admin')
                <li>
                    <button type="button"
                        class="flex items-center w-full p-2 text-base text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700"
                        aria-controls="droptown-template" data-collapse-toggle="droptown-template">
                        <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white"
                            aria-controls="droptown-template" data-collapse-toggle="droptown-template"
                            fill="currentColor" viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg">

                            <path class="st0"
                                d="m255.37 141.05c-7.4 3.583-14.732 8.548-21.533 15.357-34.091 34.098-65.081 65.088-65.081 65.088l0.013 0.02c-0.185 0.186-0.371 0.338-0.557 0.53-8.824 8.831-9.174 22.909-1.025 32.146 0.323 0.371 0.668 0.736 1.025 1.086 9.161 9.174 24.036 9.196 33.232 0l35.797-35.797c6.176 2.263 12.248 3.583 18.074 4.243 7.937 0.88 15.392 0.55 22.022-0.385 16.162-2.29 14.47-1.623 23.844-4.704 9.353-3.068 19.862-9.354 19.862-9.354l6.362 6.355c0.701 0.681 16.919 16.925 25.192 25.185 1.465 1.471 2.709 2.682 3.542 3.549 0.956 0.997 2.022 1.719 2.682 2.682l41.278 41.279c11.898-13.35 25.488-33.232 23.81-56.058l-103.14-103.13s-35.701-2.551-65.397 11.906z" />
                            <path class="st0"
                                d="m261.12 394.36c-9.134-9.147-23.961-9.147-33.101 0l-6.794 6.794c9.119-9.132 9.112-23.926-0.021-33.066-9.14-9.126-23.947-9.126-33.087 7e-3 9.14-9.133 9.14-23.94 0-33.087-9.133-9.148-23.947-9.133-33.087 0 9.14-9.133 9.14-23.947 0-33.095-9.134-9.132-23.947-9.132-33.088 0.014l-20.46 20.453c-9.14 9.147-9.14 23.947 0 33.094 9.133 9.134 23.941 9.134 33.08 0-9.14 9.134-9.14 23.947 0 33.087 9.147 9.133 23.954 9.133 33.094 0-9.14 9.133-9.14 23.941 0 33.088 9.14 9.133 23.947 9.133 33.088 0l6.802-6.809c-9.119 9.147-9.113 23.94 0.02 33.081 9.14 9.132 23.947 9.132 33.088 0l20.467-20.468c9.132-9.153 9.132-23.96-1e-3 -33.093z" />
                            <path class="st0"
                                d="m507.99 178.28-120.44-120.46c-5.351-5.337-14.002-5.337-19.339 0l-38.631 38.63c-5.337 5.337-5.337 13.989 0 19.333l120.46 120.45c5.33 5.35 13.996 5.35 19.326 0l38.63-38.638c5.351-5.322 5.351-13.974 0-19.318zm-34.332 26.712c-5.75 5.736-15.048 5.736-20.777 0-5.735-5.743-5.735-15.041 0-20.777 5.729-5.736 15.027-5.736 20.777 0 5.736 5.736 5.729 15.034 0 20.777z" />
                            <path class="st0"
                                d="m182.42 99.864-38.624-38.63c-5.336-5.337-13.995-5.337-19.332 0l-120.46 120.46c-5.337 5.323-5.337 13.989 0 19.319l38.631 38.644c5.33 5.331 14.002 5.331 19.325 0l120.46-120.46c5.344-5.337 5.344-13.989 0-19.332zm-123.3 108.54c-5.736 5.729-15.04 5.729-20.777 0-5.735-5.742-5.735-15.041 0-20.777 5.736-5.735 15.041-5.735 20.777 0 5.736 5.736 5.736 15.034 0 20.777z" />
                            <path class="st0"
                                d="m397.53 312.81-7.468-7.482-72.509-72.509-4.883 2.166-5.316 1.919-0.384 0.117c-0.936 0.296-9.684 2.971-26.932 5.412-9.12 1.273-18.156 1.431-26.904 0.434-3.459-0.385-6.898-0.95-10.296-1.692l-27.757 27.744c-16.678 16.678-43.836 16.678-60.514 0-0.585-0.591-1.149-1.19-1.671-1.781l-0.179-0.2c-10.529-11.939-13.204-28.28-8.252-42.461l10.673-16.609-0.02-0.02 65.081-65.074c2.647-2.641 5.426-5.103 8.314-7.428-20.281-3.982-37.296-2.806-37.296-2.806l-103.12 103.14c-1.389 18.988 11.651 39.799 20.928 51.952 16.692-15.963 43.239-15.756 59.641 0.654 6.107 6.1 9.952 13.617 11.574 21.498 7.895 1.637 15.406 5.475 21.513 11.582 6.107 6.114 9.952 13.631 11.575 21.519 7.888 1.623 15.412 5.46 21.513 11.568 4.078 4.078 7.152 8.783 9.222 13.817 11.1-0.137 22.242 4.016 30.688 12.455 16.65 16.636 16.643 43.733 0 60.363l-6.809 6.822 3.411 3.412c9.148 9.147 23.954 9.147 33.095 0 9.14-9.134 9.14-23.947 0-33.088l6.808 6.83c9.147 9.133 23.947 9.133 33.087 0 9.14-9.147 9.147-23.954 0-33.101 9.147 9.147 23.947 9.147 33.087 0 9.134-9.126 9.154-23.94 0-33.088 9.154 9.148 23.954 9.148 33.088 0 9.147-9.132 9.147-23.947 0-33.08l-12.986-12.985z" />

                        </svg>

                        <span class="flex-1 ml-3 text-left whitespace-nowrap">Template Dokumen</span>
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 4 4 4-4" />
                        </svg>
                    </button>
                    <ul id="droptown-template" class="hidden py-2 space-y-2">
                        <li>
                            <a href="/template/add"
                                class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Tambah
                                Template Dokumen</a>
                        </li>
                        <li>
                            <a href="/template"
                                class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Template</a>
                        </li>
                    </ul>
                </li>
            @endcan

            {{-- Template Dokumen (User) --}}
            @can('user')
                <li>
                    <a href="/template"
                        class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                        <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white"
                            fill="currentColor" viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="m256.5 96.434c26.632 0 48.213-21.597 48.213-48.205 0-26.649-21.58-48.229-48.213-48.229-26.65 0-48.222 21.58-48.222 48.229 1e-3 26.608 21.573 48.205 48.222 48.205z" />
                            <path
                                d="m298.27 119.28h-84.542c-23.362 0-48.779 25.418-48.779 48.788v162.06c0 11.685 9.463 21.156 21.148 21.156h14.756l8.048 138.21c0 12.434 10.078 22.513 22.513 22.513h24.585 24.593c12.434 0 22.513-10.078 22.513-22.513l8.04-138.21h14.764c11.676 0 21.148-9.471 21.148-21.156v-162.06c0-23.37-25.418-48.788-48.787-48.788z" />
                            <path
                                d="m104.14 149.08c23.262 0 42.105-18.85 42.105-42.104 0-23.262-18.843-42.112-42.105-42.112-23.27 0-42.104 18.851-42.104 42.112 0 23.253 18.834 42.104 42.104 42.104z" />
                            <path
                                d="m408.72 149.08c23.27 0 42.104-18.85 42.104-42.104 0-23.262-18.834-42.112-42.104-42.112-23.253 0-42.104 18.851-42.104 42.112 0 23.253 18.851 42.104 42.104 42.104z" />
                            <path
                                d="m137.26 169.02h-70.468c-20.398 0-42.595 22.213-42.595 42.612v141.53c0 10.212 8.264 18.476 18.468 18.476h12.884l7.024 120.7c0 10.852 8.805 19.658 19.666 19.658h21.473 21.472c10.861 0 19.666-8.805 19.666-19.658l7.016-120.7v-6.849c-8.98-8.856-14.606-21.082-14.606-34.664v-161.1z" />
                            <path
                                d="m445.21 169.02h-70.468v161.1c0 13.582-5.626 25.808-14.615 34.664v6.849l7.017 120.7c0 10.852 8.814 19.658 19.674 19.658h21.464 21.481c10.862 0 19.659-8.805 19.659-19.658l7.032-120.7h12.883c10.204 0 18.468-8.265 18.468-18.476v-141.53c0-20.399-22.196-42.612-42.595-42.612z" />
                        </svg>
                        <span class="ml-3">Template Dokumen</span>
                    </a>
                </li>
            @endcan

            {{-- Logout --}}
            <li>
                <form action="/logout" method="post">
                    @csrf
                    <button type="submit"
                        class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group w-full justify-normal">
                        <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                            viewBox="0 0 24 24">
                            <path
                                d="m17.293 14.293c-0.3905 0.3905-0.3905 1.0237 0 1.4142s1.0237 0.3905 1.4142 0l2.913-2.913c0.015-0.015 0.0296-0.0304 0.0436-0.0461 0.2063-0.1832 0.3363-0.4504 0.3363-0.748s-0.13-0.5648-0.3363-0.748c-0.014-0.0157-0.0286-0.0311-0.0436-0.0461l-2.913-2.913c-0.3905-0.39052-1.0237-0.39052-1.4142 0-0.3905 0.39053-0.3905 1.0237 0 1.4142l1.2929 1.2929h-5.5858c-0.5523 0-1 0.4477-1 1s0.4477 1 1 1h5.5858l-1.2929 1.2929z"
                                fill="currentColor" />
                            <path
                                d="m5 2c-1.6568 0-3 1.3432-3 3v14c0 1.6569 1.3432 3 3 3h9.5c1.3807 0 2.5-1.1193 2.5-2.5v-2.7674c-0.1481-0.0856-0.2875-0.1917-0.4142-0.3184-0.6544-0.6544-0.7605-1.6493-0.3184-2.4142h-3.2674c-1.1046 0-2-0.8954-2-2s0.8954-2 2-2h3.2674c-0.4421-0.76486-0.336-1.7598 0.3184-2.4142 0.1267-0.12669 0.2661-0.23283 0.4142-0.31841v-2.7674c0-1.3807-1.1193-2.5-2.5-2.5h-9.5z"
                                fill="currentColor" />
                        </svg>
                        <span class="ml-3 whitespace-nowrap">Logout</span>
                    </button>
                </form>
            </li>
        </ul>
    </div>
</aside>
