@props(['category'])

<div class="grid grid-cols-4 py-4 p-4">
    <div>
        <p class="text-lg font-bold text-left text-trueGray-700 mb-3">Subcategorías</p>
        <ul>
          @foreach ($category->subcategories as $subcategory)
              <li>
                <a href="{{route('categories.show', $category).'?subcategoria='.$subcategory->slug}}" class="text-trueGray-500  flex font-semibold items-center py-1 px-4 hover:font-bold hover:bg-gray-200 hover:text-black  ">
                  <span class="flex justify-center w-1 bg-orange-500 h-4 mr-2">
                                            
                  </span>
                  {{$subcategory->name}}
                </a>
              </li>
          @endforeach
        </ul>
    </div>
    <div class="col-span-3">
          <img class="h-64 w-full object-cover object-center" src="{{Storage::url($category->image)}}" alt="">
    </div>
</div>
