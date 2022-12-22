<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'Circlewood-Real-State')
<img src={{ asset('images/app-logo.png') }} class="logo" alt="Circlewood-Real-State Logo">
 <br>Circlewood Real State
@else
{{ $slot }}
@endif
</a>
</td>
</tr>
