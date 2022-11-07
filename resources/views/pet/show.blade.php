<x-app-layout>

    <div class="container py-8">
        <p class="text-center uppercase text-xl font-medium">Informacion principal de <span class="font-semibold uppercase ">Princesa</span></p>
        <div class="py-10">
            <div class="grid grid-cols-3 shadow-lg p-2">
                <div>
                    <div class="flex justify-center  mx-16">
                        <img src="{{asset('imgz/pet/coquer.jpg')}}" class="object-cover object-center w-full " alt="">
                    </div> 
                </div>
                <div class="col-span-2">
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <p class="text-lg font-semibold">DATOS DE TU MASCOTA</p>
                            <p class="font-medium">Nombre:<span class="font-normal"> Princesa</span> </p>
                            <p class="font-medium">Edad:<span class="font-normal"> 7 años</span> </p>
                            <p class="font-medium">Raza:<span class="font-normal"> Coquer</span> </p>
                        </div>
                        <div>
                            <p class="text-lg font-semibold">TRIAJE</p>
                            <p class="font-medium">Peso:<span class="font-normal"> 14 KG</span> </p>
                            <p class="font-medium">Edad:<span class="font-normal"> 12 años</span> </p>
                            <p class="font-medium">Color:<span class="font-normal"> Blanco</span> </p>
                        </div>
                    </div>  
                    
                </div>
            </div>
            <hr class="bg-gray-700 mt-8">
            <div class="my-10">
              <p class="text-center uppercase text-xl font-medium">Historial de visitas</p>  
            </div>

            <div>
                <main class="p-5 bg-light-blue">
                    <div class="flex justify-center items-start my-2">
                      <div class="w-full my-1">
                        <h2 class="text-xl font-semibold text-vnet-blue mb-2">INFORMACIÓN DE VISITAS POR FECHAS.</h2>
                        <ul class="flex flex-col">
                          <li class="bg-white my-2 shadow-lg" x-data="accordion(1)">
                            <h2
                              @click="handleClick()"
                              class="flex flex-row justify-between items-center font-semibold p-3 cursor-pointer"
                            >
                              <span>13/08/2022 </span>
                              <svg
                                :class="handleRotate()"
                                class="fill-current text-purple-700 h-6 w-6 transform transition-transform duration-500"
                                viewBox="0 0 20 20"
                              >
                                <path d="M13.962,8.885l-3.736,3.739c-0.086,0.086-0.201,0.13-0.314,0.13S9.686,12.71,9.6,12.624l-3.562-3.56C5.863,8.892,5.863,8.611,6.036,8.438c0.175-0.173,0.454-0.173,0.626,0l3.25,3.247l3.426-3.424c0.173-0.172,0.451-0.172,0.624,0C14.137,8.434,14.137,8.712,13.962,8.885 M18.406,10c0,4.644-3.763,8.406-8.406,8.406S1.594,14.644,1.594,10S5.356,1.594,10,1.594S18.406,5.356,18.406,10 M17.521,10c0-4.148-3.373-7.521-7.521-7.521c-4.148,0-7.521,3.374-7.521,7.521c0,4.147,3.374,7.521,7.521,7.521C14.148,17.521,17.521,14.147,17.521,10"></path>
                              </svg>
                            </h2>
                            <div
                              x-ref="tab"
                              :style="handleToggle()"
                              class="border-l-2 border-purple-600 overflow-hidden max-h-0 duration-500 transition-all"
                            >
                              <p class="p-3 text-gray-900">
                                Baño especial con antipulgas
                              </p>
                              <p class="p-3 text-gray-900">
                                Corte de cabello
                              </p>
                              <p class="p-3 text-gray-900">
                                Vacuna para garrapatas - Amoxicilina 500mg
                              </p>
                            </div>
                          </li>
                          <li class="bg-white my-2 shadow-lg" x-data="accordion(2)">
                            <h2
                              @click="handleClick()"
                              class="flex flex-row justify-between items-center font-semibold p-3 cursor-pointer"
                            >
                              <span>11/04/2022</span>
                              <svg
                                :class="handleRotate()"
                                class="fill-current text-purple-700 h-6 w-6 transform transition-transform duration-500"
                                viewBox="0 0 20 20"
                              >
                                <path d="M13.962,8.885l-3.736,3.739c-0.086,0.086-0.201,0.13-0.314,0.13S9.686,12.71,9.6,12.624l-3.562-3.56C5.863,8.892,5.863,8.611,6.036,8.438c0.175-0.173,0.454-0.173,0.626,0l3.25,3.247l3.426-3.424c0.173-0.172,0.451-0.172,0.624,0C14.137,8.434,14.137,8.712,13.962,8.885 M18.406,10c0,4.644-3.763,8.406-8.406,8.406S1.594,14.644,1.594,10S5.356,1.594,10,1.594S18.406,5.356,18.406,10 M17.521,10c0-4.148-3.373-7.521-7.521-7.521c-4.148,0-7.521,3.374-7.521,7.521c0,4.147,3.374,7.521,7.521,7.521C14.148,17.521,17.521,14.147,17.521,10"></path>
                              </svg>
                            </h2>
                            <div
                              class="border-l-2 border-purple-600 overflow-hidden max-h-0 duration-500 transition-all"
                              x-ref="tab"
                              :style="handleToggle()"
                            >
                            <p class="p-3 text-gray-900">
                                Baño especial con antipulgas
                              </p>
                              <p class="p-3 text-gray-900">
                                Corte de cabello
                              </p>
                              <p class="p-3 text-gray-900">
                                Vacuna para garrapatas - Amoxicilina 500mg
                              </p>
                            </div>
                          </li>
                          <li class="bg-white my-2 shadow-lg" x-data="accordion(3)">
                            <h2
                              @click="handleClick()"
                              class="flex flex-row justify-between items-center font-semibold p-3 cursor-pointer"
                            >
                              <span>23/12/2021</span>
                              <svg
                                :class="handleRotate()"
                                class="fill-current text-purple-700 h-6 w-6 transform transition-transform duration-500"
                                viewBox="0 0 20 20"
                              >
                                <path d="M13.962,8.885l-3.736,3.739c-0.086,0.086-0.201,0.13-0.314,0.13S9.686,12.71,9.6,12.624l-3.562-3.56C5.863,8.892,5.863,8.611,6.036,8.438c0.175-0.173,0.454-0.173,0.626,0l3.25,3.247l3.426-3.424c0.173-0.172,0.451-0.172,0.624,0C14.137,8.434,14.137,8.712,13.962,8.885 M18.406,10c0,4.644-3.763,8.406-8.406,8.406S1.594,14.644,1.594,10S5.356,1.594,10,1.594S18.406,5.356,18.406,10 M17.521,10c0-4.148-3.373-7.521-7.521-7.521c-4.148,0-7.521,3.374-7.521,7.521c0,4.147,3.374,7.521,7.521,7.521C14.148,17.521,17.521,14.147,17.521,10"></path>
                              </svg>
                            </h2>
                            <div
                              class="border-l-2 border-purple-600 overflow-hidden max-h-0 duration-500 transition-all"
                              x-ref="tab"
                              :style="handleToggle()"
                            >
                              <p class="p-3 text-gray-900">
                                We allow the return of all items within 30 days of your original order’s date. If you’re interested in returning your items, send us an email with your order number and we’ll ship a return label.
                              </p>
                            </div>
                          </li>
                          <li class="bg-white my-2 shadow-lg" x-data="accordion(4)">
                            <h2
                              @click="handleClick()"
                              class="flex flex-row justify-between items-center font-semibold p-3 cursor-pointer"
                            >
                              <span>15/09/2021</span>
                              <svg
                                :class="handleRotate()"
                                class="fill-current text-purple-700 h-6 w-6 transform transition-transform duration-500"
                                viewBox="0 0 20 20"
                              >
                                <path d="M13.962,8.885l-3.736,3.739c-0.086,0.086-0.201,0.13-0.314,0.13S9.686,12.71,9.6,12.624l-3.562-3.56C5.863,8.892,5.863,8.611,6.036,8.438c0.175-0.173,0.454-0.173,0.626,0l3.25,3.247l3.426-3.424c0.173-0.172,0.451-0.172,0.624,0C14.137,8.434,14.137,8.712,13.962,8.885 M18.406,10c0,4.644-3.763,8.406-8.406,8.406S1.594,14.644,1.594,10S5.356,1.594,10,1.594S18.406,5.356,18.406,10 M17.521,10c0-4.148-3.373-7.521-7.521-7.521c-4.148,0-7.521,3.374-7.521,7.521c0,4.147,3.374,7.521,7.521,7.521C14.148,17.521,17.521,14.147,17.521,10"></path>
                              </svg>
                            </h2>
                            <div
                              class="border-l-2 border-purple-600 overflow-hidden max-h-0 duration-500 transition-all"
                              x-ref="tab"
                              :style="handleToggle()"
                            >
                              <p class="p-3 text-gray-900">
                                Changes to an existing order can be made as long as the order is still in “processing” status. Please contact our team via email and we’ll make sure to apply the needed changes. If your order has already been shipped, we cannot apply any changes to it. If you are unhappy with your order when it arrives, please contact us for any changes you may require.
                              </p>
                            </div>
                          </li>
                          <li class="bg-white my-2 shadow-lg" x-data="accordion(5)">
                            <h2
                              @click="handleClick()"
                              class="flex flex-row justify-between items-center font-semibold p-3 cursor-pointer"
                            >
                              <span>01/03/2020</span>
                              <svg
                                :class="handleRotate()"
                                class="fill-current text-purple-700 h-6 w-6 transform transition-transform duration-500"
                                viewBox="0 0 20 20"
                              >
                                <path d="M13.962,8.885l-3.736,3.739c-0.086,0.086-0.201,0.13-0.314,0.13S9.686,12.71,9.6,12.624l-3.562-3.56C5.863,8.892,5.863,8.611,6.036,8.438c0.175-0.173,0.454-0.173,0.626,0l3.25,3.247l3.426-3.424c0.173-0.172,0.451-0.172,0.624,0C14.137,8.434,14.137,8.712,13.962,8.885 M18.406,10c0,4.644-3.763,8.406-8.406,8.406S1.594,14.644,1.594,10S5.356,1.594,10,1.594S18.406,5.356,18.406,10 M17.521,10c0-4.148-3.373-7.521-7.521-7.521c-4.148,0-7.521,3.374-7.521,7.521c0,4.147,3.374,7.521,7.521,7.521C14.148,17.521,17.521,14.147,17.521,10"></path>
                              </svg>
                            </h2>
                            <div
                              class="border-l-2 border-purple-600 overflow-hidden max-h-0 duration-500 transition-all"
                              x-ref="tab"
                              :style="handleToggle()"
                            >
                              <p class="p-3 text-gray-900">
                                For USA domestic orders we offer FedEx and USPS shipping.
                              </p>
                            </div>
                          </li>
                          
                        </ul>
                      </div>
                    </div>
                  </main>
            </div>
        </div>
    </div>
@push('script')
<script>
    document.addEventListener('alpine:init', () => {
      Alpine.store('accordion', {
        tab: 0
      });
      
      Alpine.data('accordion', (idx) => ({
        init() {
          this.idx = idx;
        },
        idx: -1,
        handleClick() {
          this.$store.accordion.tab = this.$store.accordion.tab === this.idx ? 0 : this.idx;
        },
        handleRotate() {
          return this.$store.accordion.tab === this.idx ? 'rotate-180' : '';
        },
        handleToggle() {
          return this.$store.accordion.tab === this.idx ? `max-height: ${this.$refs.tab.scrollHeight}px` : '';
        }
      }));
    })
  </script>
@endpush
</x-app-layout>