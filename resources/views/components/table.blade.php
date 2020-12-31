<table {{ $attributes->merge(['class' =>  'min-w-full divide-y divide-gray-200']) }}>

    <thead class="bg-gray-50">
        <tr>
            {{ $head }}
        </tr>
    </thead>

    <tbody class="bg-white divide-y divide-gray-200">

        {{ $body }}

    </tbody>

    <tfoot>

        {{ isset($footer) ? $footer : '' }}

    </tfoot>

</table>
