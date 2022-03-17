<x-layout>
    <section class="py-2">
        <main class="max-w-xl mx-auto mt-10 bg-gray-100 p-6 rounded-xl border border-gray-200">
            <h1 class="text-center font-bold text-xl">Bullsnake Inc Application</h1>
            <p class="my-2 text-xs">It is our policy to comply with all applicable state and federal laws prohibiting discrimination in employment based on race, age, color, sex,
                religion, national origin, disability or other protected classifications.
                Please carefully read and answer all questions to the best of your ability. You will not be considered for employment if you fail to answer all of the required(*) questions
                on this application. </p>
            <form method="Post" action="apply" class="mt-5">
                @csrf
                <div class="flex flex-wrap -mx-3 mb">
                    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                        <x-form.input name="first_name" type="name" />
                    </div>
                    <div class="w-full md:w-1/2 px-3">
                        <x-form.input name="last_name" type="name" />
                    </div>
                </div>
                <div class="flex flex-wrap -mx-3 mb">
                    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                        <x-form.input name="phone_number" type="phone_number"/>
                    </div>
                    <div class="w-full md:w-1/2 px-3">
                        <x-form.input name="email" type="email"/>
                    </div>
                </div>
                <div class="flex flex-wrap -mx-3">
                    <div class="w-full px-3">
                        <x-form.input name="home_address" type="home_address"/>
                    </div>
                </div>
                <div class="flex flex-wrap -mx-3 mb">
                    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                        <x-form.input name="preferred_hours_amount" type="name" />
                    </div>
                    <div class="w-full md:w-1/2 px-3">
                        <x-form.input name="commute_preference" type="name" />
                    </div>
                </div>
                <div class="flex flex-wrap -mx-3 mb">
                    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                        <x-form.input name="valid_dot_card" type="valid_dot_card"/>
                    </div>
                    <div class="w-full md:w-1/2 px-3">
                        <x-form.input name="availability" type="availability"/>
                    </div>
                </div>
                <div class="flex flex-wrap -mx-3">
                    <div class="w-full px-3">
                        <x-form.textarea class="h-20" name="special_considerations" type="special_considerations"/>
                    </div>
                </div>
                <div class="flex flex-wrap -mx-3">
                    <div class="w-full px-3">
                        <x-form.textarea class="h-20" name="usps_experience" type="usps_experience"/>
                    </div>
                </div>
                <div class="flex flex-wrap -mx-3">
                    <div class="w-full px-3">
                        <x-form.textarea class="h-20" name="employment_history" type="employment_history"/>
                    </div>
                </div>
                <div class="flex flex-wrap -mx-3">
                    <div class="w-full px-3">
                        <x-form.input name="criminal_history" type="criminal_history"/>
                    </div>
                </div>
                <div class="flex flex-wrap -mx-3">
                    <div class="w-full px-3">
                        <x-form.input name="driver_class" type="driver_class"/>
                    </div>
                </div>
                <div class="flex flex-wrap -mx-3">
                    <div class="w-full px-3">
                        <x-form.textarea name="questions_for_employer" type="questions_for_employer"/>
                    </div>
                </div>
                <p>*Note for later put consent checkbox here for driving record pull*</p>
                <div class="mb-6">
                    <button type="submit" class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500">Submit</button>
                </div>
                @if ($errors->any())
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li class="text-red-500 text-xs">{{ $error }}</li>
                        @endforeach
                    </ul>
                @endif
            </form>
        </main>
    </section>
</x-layout>
