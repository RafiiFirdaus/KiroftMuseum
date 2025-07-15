<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

class HomeController extends Controller
{
    public function index()
    {
        return view('home');
    }

    public function dashboard()
    {
        return view('dashboard');
    }

    public function museums()
    {
        return view('museums');
    }

    public function museumsByProvince($province)
    {
        // Map province slugs to proper names
        $provinceNames = [
            'east-java' => 'East Java',
            'west-java' => 'West Java',
            'central-java' => 'Central Java'
        ];

        // Check if province exists
        if (!array_key_exists($province, $provinceNames)) {
            abort(404);
        }

        $provinceName = $provinceNames[$province];

        // Sample museum data for each province
        $museumData = $this->getMuseumData($province);

        return view('museums.province', [
            'province' => $province,
            'provinceName' => $provinceName,
            'museums' => $museumData
        ]);
    }

    private function getMuseumData($province)
    {
        $museums = [
            'east-java' => [
                [
                    'name' => 'Museum 10 Nopember',
                    'description' => 'A museum commemorating the historic Battle of Surabaya on November 10, 1945, showcasing the heroic struggle of Indonesian independence.',
                    'location' => 'Surabaya',
                    'image' => 'museums east java/museum 10 nop.png'
                ],
                [
                    'name' => 'Museum Angkut',
                    'description' => 'An exciting transportation museum featuring vintage cars, motorcycles, and various vehicles from around the world.',
                    'location' => 'Batu, Malang',
                    'image' => 'museums east java/museum angkut.png'
                ],
                [
                    'name' => 'Museum Satwa',
                    'description' => 'A natural history museum displaying preserved animals and educating visitors about wildlife conservation in Indonesia.',
                    'location' => 'Batu, Malang',
                    'image' => 'museums east java/museum satwa.png'
                ]
            ],
            'west-java' => [
                [
                    'name' => 'Museum Geologi',
                    'description' => 'A fascinating geological museum showcasing Indonesia\'s rich geological heritage, featuring minerals, fossils, rocks, and interactive exhibits about volcanoes and earthquakes.',
                    'location' => 'Bandung',
                    'image' => 'museums west java/museum geo.png'
                ],
                [
                    'name' => 'NuArt Sculpture Park',
                    'description' => 'An innovative outdoor sculpture park and gallery featuring contemporary art installations set in beautiful natural surroundings, blending art with nature.',
                    'location' => 'Bandung',
                    'image' => 'museums west java/nuart.png'
                ],
                [
                    'name' => 'The Bucketlist Indonesia',
                    'description' => 'A unique interactive museum and experience center featuring Instagram-worthy installations and immersive exhibits designed for memorable photo opportunities.',
                    'location' => 'Bandung',
                    'image' => 'museums west java/bucketlist.png'
                ]
            ],
            'central-java' => [
                [
                    'name' => 'Museum Batik Danar Hadi',
                    'description' => 'A comprehensive museum showcasing the rich heritage of Indonesian batik art, featuring traditional and contemporary batik collections from across the archipelago.',
                    'location' => 'Solo',
                    'image' => 'museums central java/museum batik.png'
                ],
                [
                    'name' => 'Museum Kereta Api Ambarawa',
                    'description' => 'A fascinating railway museum featuring vintage locomotives and train cars, preserving the history of Indonesian railways and transportation heritage.',
                    'location' => 'Ambarawa',
                    'image' => 'museums central java/museum kereta.png'
                ],
                [
                    'name' => 'Museum Prasejarah Sangiran',
                    'description' => 'A world-renowned prehistoric museum displaying ancient human fossils and artifacts, recognized as a UNESCO World Heritage Site for its archaeological significance.',
                    'location' => 'Sangiran',
                    'image' => 'museums central java/museum prasejarah.png'
                ]
            ]
        ];

        return $museums[$province] ?? [];
    }

    public function museumDetail($province, $slug)
    {
        // Map province slugs to proper names
        $provinceNames = [
            'east-java' => 'East Java',
            'west-java' => 'West Java',
            'central-java' => 'Central Java'
        ];

        // Check if province exists
        if (!array_key_exists($province, $provinceNames)) {
            abort(404);
        }

        $provinceName = $provinceNames[$province];

        // Get all museums for the province
        $museums = $this->getMuseumData($province);

        // Find the specific museum by slug
        $museum = null;
        foreach ($museums as $museumData) {
            $museumSlug = Str::slug($museumData['name']);
            if ($museumSlug === $slug) {
                $museum = $museumData;
                break;
            }
        }

        if (!$museum) {
            abort(404);
        }

        // Add detailed information for Museum 10 Nopember
        if ($slug === 'museum-10-nopember') {
            $museum['detailed_info'] = [
                'description' => 'Museum 10 November is a historical museum located within the Tugu Pahlawan (Heroes Monument) complex in Surabaya. Built to honor the bravery of Surabaya\'s youth (arek-arek Suroboyo) during the heroic battle against colonial forces on November 10, 1945, the museum serves as a powerful reminder of Indonesia\'s struggle for independence. Combining education and national history, the museum features more than 1,000 artifacts, including battle documents, weapons, dioramas, and the legendary recorded speeches of Bung Tomo, a key figure in the independence movement.',
                'tickets' => [
                    'general' => 'Rp 15.000',
                    'student' => 'Rp 10.000',
                    'student_note' => '(valid for elementary to high school students with ID)'
                ],
                'schedule' => [
                    'days' => 'Valid Every Day',
                    'hours' => '08.00 - 15.00',
                    'note' => '(weekdays, weekends & holidays)'
                ],
                'special_offers' => [
                    'group_discount' => 'group discounts available for 20+ visitors',
                    'senior_free' => 'free entry for senior citizens (age 65+)'
                ],
                'facilities' => [
                    '🎞️ Electronic & Static Diorama Room',
                    '🎤 Auditorium',
                    '📚 Library',
                    '🕌 Prayer Room (Mushola)',
                    '🤱 Lactation Room',
                    '🧸 Kidzone',
                    '🚗 Parking Area',
                    '🌳 Open Field / Yard',
                    '🚻 Clean Toilets',
                    '👩‍👧‍👦 Mother & Child Room',
                    '🖼️ Collections'
                ],
                'location' => [
                    'address' => 'Jl. Pahlawan, Alun-alun Contong, Kec. Bubutan, Surabaya, East Java 60174',
                    'maps_url' => 'https://maps.app.goo.gl/BAaF4vRqUXgM7NGr5'
                ]
            ];
        }

        return view('museums.detail', [
            'museum' => $museum,
            'province' => $province,
            'provinceName' => $provinceName
        ]);
    }

    public function museumBooking($province, $slug)
    {
        return view('museums.booking', [
            'province' => $province,
            'slug' => $slug
        ]);
    }

    public function bookingSubmit(Request $request)
    {
        // Validate the booking form data
        $validatedData = $request->validate([
            'museum' => 'required|string',
            'ticket_type' => 'required|in:general,student',
            'full_name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'required|string',
            'visit_date' => 'required|date',
            'time_slot' => 'required|string',
            'student_id' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:10240', // 10MB max
            'promo_code' => 'nullable|string'
        ]);

        // Here you would typically save the booking to database
        // For now, we'll just redirect with a success message

        return redirect()->route('museums.detail', [
            'province' => $request->input('province', 'east-java'),
            'slug' => $validatedData['museum']
        ])->with('success', 'Your booking has been submitted successfully! You will receive a confirmation email shortly.');
    }
}
