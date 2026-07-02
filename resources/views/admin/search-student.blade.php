{{-- resources/views/admin/search-student.blade.php --}}
<x-app-layout title="Search Students">
    <x-slot name="header">Search Students</x-slot>

    {{-- Search Form --}}
    <div class="card" style="margin-bottom:1.5rem;">
        <form method="GET" action="{{ route('admin.searchStudent') }}">
            <div style="display:flex;gap:0.75rem;align-items:center;">
                <div style="flex:1;position:relative;">
                    <svg style="position:absolute;left:14px;top:50%;transform:translateY(-50%);width:18px;height:18px;color:#475569;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                    <input type="text" name="query" value="{{ request('query') }}" placeholder="Search by name or email..." class="form-input" style="padding-left:42px;">
                </div>
                <button type="submit" class="btn-primary" style="white-space:nowrap;">
                    Search
                </button>
            </div>
        </form>
    </div>

    {{-- Results --}}
    @if(isset($students))
    @if($students->count() > 0)
    <div class="card" style="padding:0;overflow:hidden;">
        <table class="data-table">
            <thead>
                <tr>
                    <th>Student</th>
                    <th>Email</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($students as $student)
                <tr>
                    <td>
                        <div style="display:flex;align-items:center;gap:10px;">
                            <div style="width:32px;height:32px;background:linear-gradient(135deg,rgba(245,158,11,0.2),rgba(217,119,6,0.1));border-radius:50%;display:flex;align-items:center;justify-content:center;font-size:0.8rem;font-weight:700;color:#f59e0b;">
                                {{ strtoupper(substr($student->name, 0, 1)) }}
                            </div>
                            <span style="font-weight:600;color:#f1f5f9;">{{ $student->name }}</span>
                        </div>
                    </td>
                    <td style="color:#64748b;">{{ $student->email }}</td>
                    <td>
                        <a href="{{ route('admin.viewStudent', $student->id) }}" class="btn-edit">
                            View Details
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @else
    <div style="text-align:center;padding:3rem;color:#475569;">
        <div style="font-size:3rem;margin-bottom:0.75rem;">🔍</div>
        <div style="font-weight:600;color:#64748b;">No students found for "{{ request('query') }}"</div>
    </div>
    @endif
    @else
    <div style="text-align:center;padding:3rem;color:#475569;">
        <div style="font-size:3rem;margin-bottom:0.75rem;">👩‍🎓</div>
        <div style="font-weight:600;color:#64748b;">Enter a name or email to search</div>
    </div>
    @endif
</x-app-layout>