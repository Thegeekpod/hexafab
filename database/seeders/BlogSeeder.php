<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Blog;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $blogs = [
            [
                'title' => 'From Straw To Steel: The Evolution Of Coated Roofing Materials',
                'slug' => 'from-straw-to-steel-the-evolution-of-materials',
                'tag' => 'BLOG',
                'description' => 'Explore the architectural journey from traditional roofing to modern Zincalume® and Colorbond® coated steel solutions engineered for high durability.',
                'content' => "In an era where structural resilience and thermal efficiency are critical engineering requirements, industrial roofing has undergone a profound transformation. For centuries, structures relied on organic and clay-based materials, which were vulnerable to climatic wear, water seepage, and high maintenance cycles.\n\nToday, advanced Zincalume® and Colorbond® color-coated steel sheets represent the pinnacle of modern building envelopes. With zinc-aluminium alloy coatings providing active galvanic protection and high-grade primer layers, these roofing systems withstand heavy monsoons, extreme ultraviolet radiation, and corrosive industrial emissions.\n\nKey Highlights:\n- Active sacrificial protection preventing edge-creep rust.\n- Exceptional solar reflectance index (SRI) reducing internal facility temperatures by up to 6°C.\n- Lightweight profile allowing for lighter purlin framing and structural cost savings.",
                'image_path' => 'img/HEXA-PROJECTS/Trapezoidal-Sheet1.png',
                'link_text' => 'Read more →',
                'author' => 'Hexafab Editorial Team',
                'reading_time' => '5 min read',
                'is_featured' => true,
            ],
            [
                'title' => 'Monsoon-Proofing Industrial Roofs With Standing Seam Systems',
                'slug' => 'monsoon-proof-your-roof-with-color-coated-steel',
                'tag' => 'CAMPAIGN',
                'description' => 'Discover how 360-degree double-lock standing seam profiles eliminate pierced fasteners, delivering 100% watertight protection across heavy monsoon regions.',
                'content' => "Industrial facilities and warehouse complexes face severe risk of water ingress during peak monsoon seasons. Traditional through-fastened screw roof profiles frequently develop leaks around washers due to thermal expansion and contraction cycles.\n\nHexafab's Standing Seam Sheet technology solves this fundamental challenge through a concealed clip system and automated 360° mechanical seaming:\n\n1. Zero Roof Penetration: Eliminates all exposed screw holes across the water-carrying pan.\n2. Unrestricted Thermal Movement: Concealed sliding clips allow the steel to expand and contract freely without stress tearing.\n3. Continuous Long Lengths: On-site roll forming eliminates end-laps on roofs up to 100 meters long, ensuring flawless watershedding even on ultra-low slopes down to 1°.\n\nEngineered with high tensile strength steel, the system withstands extreme negative wind uplift pressures, making it ideal for coastal and cyclone-prone zones.",
                'image_path' => 'img/HEXA-PROJECTS/Standing-Seam-Sheet1.png',
                'link_text' => 'Explore campaign →',
                'author' => 'Technical Engineering Division',
                'reading_time' => '4 min read',
                'is_featured' => true,
            ],
            [
                'title' => 'Best Practices for Structural Steel Purlins: C & Z Optimization',
                'slug' => 'best-practices-a-technical-deep-dive',
                'tag' => 'WEBINAR',
                'description' => 'Join our structural experts for deep insights on cold-formed C/Z purlin spanning, pre-punched hole alignment, and weight optimization for PEB structures.',
                'content' => "In Pre-Engineered Building (PEB) design, cold-formed C and Z purlins act as the primary secondary framing system transferring roof loads to main rafters.\n\nOptimizing purlin selection yields major advantages in project speed and economy:\n- High Tensile Strength: Fabricated from 450-550 MPa high-yield galvanized steel for superior load capacity at lower dead weight.\n- Continuous Lapping: Z-purlins can be nested at supports to create a continuous beam effect, increasing span capacity by up to 25%.\n- Pre-Punched Accuracy: CNC punching guarantees pinpoint hole alignment, eliminating on-site drilling and speeding up erection schedules.\n\nHexafab provides custom roll-formed C and Z profiles tailored to exact structural drawings, complete with anti-sag rods and cleat accessories.",
                'image_path' => 'img/HEXA-PROJECTS/CZ-PRULIN-1.png',
                'link_text' => 'Watch webinar →',
                'author' => 'Structural Solutions Team',
                'reading_time' => '7 min read',
                'is_featured' => true,
            ],
            [
                'title' => 'Why Choose Hexafab Steels for Commercial & Industrial Infrastructure',
                'slug' => 'why-choose-hexafab-steels-for-your-next-project',
                'tag' => 'BLOG',
                'description' => 'Learn why top developers, architects, and EPC contractors choose Hexafab for high-yield flat-coated steel, rapid manufacturing, and strict IMS quality control.',
                'content' => "Choosing the right building envelope partner is essential to ensure decades of low-maintenance operation and aesthetic elegance. At Hexafab Steels, our state-of-the-art manufacturing plant in Howrah (Ganesh Complex) operates under stringent Integrated Management System (IMS) quality standards.\n\nWhy Hexafab is the preferred choice for industrial builders:\n1. Premium Raw Materials: We partner with leading primary steel producers to ensure certified zinc-aluminium coatings and vibrant paint finishes.\n2. Comprehensive Range: From trapezoidal and corrugated sheets to standing seam, deck sheets, and C/Z purlins, all secondary structural elements are available under one roof.\n3. On-Time Logistics: Strategic location on NH6 enables seamless dispatch and expedited delivery across West Bengal and Eastern India.\n4. Technical Consultation: Our in-house engineering team provides wind load calculations, span charts, and bill of quantities (BOQ) support for architectural firms.",
                'image_path' => 'img/Banner/Banner-1.png',
                'link_text' => 'Read more →',
                'author' => 'Hexafab Leadership Team',
                'reading_time' => '6 min read',
                'is_featured' => true,
            ],
        ];

        foreach ($blogs as $blog) {
            Blog::updateOrCreate(['slug' => $blog['slug']], $blog);
        }
    }
}
