<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::updateOrCreate(
            ['email' => 'admin@hexafab.com'],
            [
                'name' => 'Admin User',
                'password' => bcrypt('password'),
            ]
        );

        // Seed Products
        $products = [
            [
                'title' => 'Standing Seam Sheet',
                'slug' => 'standing-seam-sheet',
                'badge' => 'Premium',
                'image_path' => 'img/PRODUCT-COVER-IMAGES/STANDING-SEAM-SHEET.png',
                'hero_image' => 'img/PRODUCT-COVER-IMAGES/STANDING-SEAM-SHEET.png',
                'hero_title' => 'The Engineering Standard — Hexa Standing Seam Series',
                'hero_subtitle' => 'PREMIUM SYSTEM',
                'hero_desc' => 'Elevate your project with a high-performance standing seam system, engineered for absolute watertightness and a clean, modern aesthetic that defines the future of industrial.',
                'drawing_image' => 'images/DRAWING/STANDING-SEAM1.png',
                'tech_details' => [
                    '300-350 MPA',
                    'Length customization',
                    'On-site profiling and Installation',
                    '360° Seam',
                    'Thickness: .50 - .70 mm',
                    "Benefits: Refer to Tata's website",
                ],
                'specifications' => [
                    ['label' => 'PROFILE DEPTH', 'value' => '65mm'],
                    ['label' => 'THICKNESS RANGE', 'value' => '0.50mm – 0.80mm'],
                    ['label' => 'LOAD TYPE', 'value' => 'High Wind Rated'],
                ],
                'spec_bar' => [
                    ['label' => 'SUBSTRATE', 'value' => 'Zincalume® Steel'],
                    ['label' => 'SEAM HEIGHT', 'value' => '65mm Double Lock'],
                    ['label' => 'MIN. SLOPE', 'value' => '1°'],
                    ['label' => 'FASTENING', 'value' => 'Fully Concealed'],
                ],
                'app_heading' => 'Precision Engineering for <br>Diverse Environments',
                'app_commercial_title' => 'Commercial Hubs',
                'app_commercial_desc' => 'Sleek vertical lines define the skyline — ideal for premium office complexes, airports and stadiums that demand a bold architectural statement.',
                'app_commercial_image' => 'img/HEXA-PROJECTS/Standing-Seam-Sheet2.png',
                'app_industrial_title' => 'Industrial Megastructures',
                'app_industrial_desc' => 'From automotive plants to logistics parks, standing seam protects sensitive high-value inventory and machinery with an unbroken membrane.',
                'app_industrial_image' => 'img/HEXA-PROJECTS/Standing-Seam-Sheet1.png',
                'details' => [
                    ['title' => 'Mechanical Seaming', 'desc' => 'Instead of screws, panels are mechanically folded together using precision rollers, creating a 100% puncture-free surface that eliminates fastener-related leaks at the source.', 'icon' => 'shield'],
                    ['title' => 'Thermal Expansion Control', 'desc' => 'A concealed clip system lets the steel move naturally as it heats and cools, preventing oil-canning and keeping the roof flat through extreme temperature swings.', 'icon' => 'thermal'],
                    ['title' => 'Longevity & ROI', 'desc' => 'With a service life beyond 50 years, standing seam offers the lowest total cost of ownership in the category, needing virtually no maintenance while lifting property value.', 'icon' => 'clock'],
                    ['title' => 'Acoustic Comfort', 'desc' => 'Optional acoustic layers between panel and substrate cut down rainfall and hail noise significantly, keeping interiors calm during heavy weather.', 'icon' => 'acoustic'],
                    ['title' => 'Alu-Zinc Protection', 'desc' => 'Steel is coated with a precise Aluminum-Zinc-Silicon alloy: aluminum provides barrier protection, while zinc offers sacrificial defence at cut edges and scratches.', 'icon' => 'alu-zinc'],
                    ['title' => 'Solar-Ready', 'desc' => 'The raised-seam profile is a natural fit for solar PV mounting using clamp systems that avoid roof penetrations entirely, keeping the warranty intact while generating clean energy.', 'icon' => 'solar'],
                ],
            ],
            [
                'title' => 'Circular Corrugated Sheet',
                'slug' => 'circular-corrugated-sheet',
                'badge' => 'Classic',
                'image_path' => 'img/PRODUCT-COVER-IMAGES/CIRCULAR-CORRUGATED-SHEET.png',
                'hero_image' => 'img/PRODUCT-COVER-IMAGES/CIRCULAR-CORRUGATED-SHEET.png',
                'hero_title' => 'Timeless Strength — Hexa Corrugated Series',
                'hero_subtitle' => 'CLASSIC PROFILE',
                'hero_desc' => 'The profile that built modern India, re-engineered with high-tensile coated steel for a lifetime of dependable, lowmaintenance protection.',
                'drawing_image' => 'images/DRAWING/CIRCULAR1.png',
                'tech_details' => [
                    'Thickness: .30- 1.2 mm',
                ],
                'specifications' => [
                    ['label' => 'PROFILE DEPTH', 'value' => '19mm'],
                    ['label' => 'THICKNESS RANGE', 'value' => '0.35mm – 0.60mm'],
                    ['label' => 'LOAD TYPE', 'value' => 'Medium Load Rated'],
                ],
                'spec_bar' => [
                    ['label' => 'SUBSTRATE', 'value' => 'Galvalume® / GI Steel'],
                    ['label' => 'CORRUGATION', 'value' => '8–10 Waves per Sheet'],
                    ['label' => 'MIN. SLOPE', 'value' => '5°'],
                    ['label' => 'FASTENING', 'value' => 'J & L Hooks / Self-Drilling Screws'],
                ],
                'app_heading' => 'Timeless Strength for <br>Every Application',
                'app_commercial_title' => 'Commercial & Residential',
                'app_commercial_desc' => 'A trusted, budget-friendly roof that stands up to years of harsh sun, monsoon and daily wear across modern structures.',
                'app_commercial_image' => 'img/HEXA-PROJECTS/circular-sheet-1.png',
                'app_industrial_title' => 'Industrial Warehouses & Sheds',
                'app_industrial_desc' => 'Fast to install over large spans, making it the go-to choice for storage sheds, godowns and light-industrial buildings.',
                'app_industrial_image' => 'img/HEXA-PROJECTS/circular-sheet-2.png',
                'details' => [
                    ['title' => 'Wave Geometry', 'desc' => 'The classic curved corrugation distributes load evenly across the sheet, giving it exceptional resistance to wind uplift and foot traffic during installation.', 'icon' => 'shield'],
                    ['title' => 'Fast-Track Installation', 'desc' => 'Lightweight panels and simple hook-and-screw fixing mean roofs go up faster, cutting labour time and project costs.', 'icon' => 'lightning'],
                    ['title' => 'Corrosion Resistance', 'desc' => 'A robust metallic coating layer shields the steel core from rust, extending service life even in humid or industrial atmospheres.', 'icon' => 'clock'],
                    ['title' => 'Water Shedding', 'desc' => 'Deep, continuous waves channel rainwater away efficiently, reducing pooling risk even on gentler roof slopes.', 'icon' => 'water'],
                    ['title' => 'Colour Retention', 'desc' => 'Factory-applied coatings resist UV fading and chalking, keeping roofs looking fresh season after season.', 'icon' => 'sun'],
                    ['title' => 'Economy & Efficiency', 'desc' => 'Highly affordable upfront cost combined with zero maintenance makes it the most economic choice for standard structures.', 'icon' => 'rupee'],
                ],
            ],
            [
                'title' => 'Trapezoidal Sheet',
                'slug' => 'trapezoidal-sheet',
                'badge' => 'Heavy-Duty',
                'image_path' => 'img/PRODUCT-COVER-IMAGES/TRAPEZOIDAL-SHEET.png',
                'hero_image' => 'img/PRODUCT-COVER-IMAGES/TRAPEZOIDAL-SHEET.png',
                'hero_title' => 'Built for Load — Hexa Trapezoidal Series',
                'hero_subtitle' => 'HEAVY-DUTY INDUSTRIAL PROFILE',
                'hero_desc' => 'Deep, angular ribs engineered for maximum structural strength and rapid drainage — the preferred choice for large-span industrial and commercial rooftops.',
                'drawing_image' => 'images/DRAWING/Trapezoidal.png',
                'tech_details' => null,
                'specifications' => [
                    ['label' => 'PROFILE DEPTH', 'value' => '30mm'],
                    ['label' => 'THICKNESS RANGE', 'value' => '0.45mm – 0.80mm'],
                    ['label' => 'LOAD TYPE', 'value' => 'Heavy Load Rated'],
                ],
                'spec_bar' => [
                    ['label' => 'SUBSTRATE', 'value' => 'Galvalume® Steel'],
                    ['label' => 'RIB DEPTH', 'value' => '28–35mm Trapezoid'],
                    ['label' => 'MIN. SLOPE', 'value' => '3°'],
                    ['label' => 'SPAN CAPABILITY', 'value' => 'Wide-Bay Rated'],
                ],
                'app_heading' => 'Structural Rigidity for <br>Demanding Projects',
                'app_commercial_title' => 'Commercial Rooftops',
                'app_commercial_desc' => 'A strong, linear profile that reads as modern and industrial across malls, stadiums and multiplex structures.',
                'app_commercial_image' => 'img/HEXA-PROJECTS/Trapezoidal-Sheet1.png',
                'app_industrial_title' => 'Warehousing & Manufacturing',
                'app_industrial_desc' => 'Deep ribs allow wide purlin spacing and high load-bearing capacity, reducing structural steel costs across long-span industrial sheds.',
                'app_industrial_image' => 'img/HEXA-PROJECTS/Trapezoidal-Sheet2.png',
                'details' => [
                    ['title' => 'Rigid Rib Design', 'desc' => 'Trapezoidal ribs act like structural beams within the sheet, delivering superior load-bearing and wind-uplift resistance compared to flatter profiles.', 'icon' => 'shield'],
                    ['title' => 'Rapid Drainage', 'desc' => 'Steep-sided troughs move water off the roof quickly, minimizing standing water even during intense monsoon downpours.', 'icon' => 'water'],
                    ['title' => 'Wide-Span Efficiency', 'desc' => 'Deeper ribs allow greater purlin spacing, reducing the amount of structural steel needed and lowering overall project cost.', 'icon' => 'alu-zinc'],
                    ['title' => 'Walkability', 'desc' => 'The rigid profile safely supports maintenance foot traffic without denting, an important safety factor for large industrial roofs.', 'icon' => 'walk'],
                    ['title' => 'Anti-Capillary Groove', 'desc' => 'A precision-engineered side-lap groove blocks capillary water movement at every joint, keeping the underside completely dry.', 'icon' => 'flag'],
                    ['title' => 'Color Integrity', 'desc' => 'Protected by multi-layer oven-baked coatings that resist scratches and UV fading in heavy industrial environments.', 'icon' => 'square'],
                ],
            ],
            [
                'title' => 'Liner Sheet',
                'slug' => 'liner-sheet',
                'badge' => 'Hygienic',
                'image_path' => 'img/PRODUCT-COVER-IMAGES/LINER-SHEET.png',
                'hero_image' => 'img/PRODUCT-INNER-PAGES-IMAGES/LINER SHEET.png',
                'hero_title' => 'The Clean Inner Skin — Hexa Liner Series',
                'hero_subtitle' => 'INSULATED CEILING SOLUTION',
                'hero_desc' => 'Purpose-built for insulated systems, our liner sheets form the smooth, hygienic ceiling that sits beneath insulation — engineered for clean interiors, thermal efficiency and easy maintenance.',
                'drawing_image' => 'images/DRAWING/LINER-SHEET1.png',
                'tech_details' => null,
                'specifications' => [
                    ['label' => 'PROFILE DEPTH', 'value' => '15mm'],
                    ['label' => 'THICKNESS RANGE', 'value' => '0.40mm – 0.60mm'],
                    ['label' => 'LOAD TYPE', 'value' => 'Light Load Rated'],
                ],
                'spec_bar' => [
                    ['label' => 'SUBSTRATE', 'value' => 'GI / Galvalume® Steel'],
                    ['label' => 'PROFILE', 'value' => 'Micro-Rib / Low-Trapezoidal'],
                    ['label' => 'COATING THICKNESS', 'value' => '0.40mm – 0.60mm TCT'],
                    ['label' => 'FINISH', 'value' => 'Interior-Grade RP Coating'],
                ],
                'app_heading' => 'Hygienic Finish for <br>Insulated Systems',
                'app_commercial_title' => 'Commercial Cold Storage',
                'app_commercial_desc' => 'Forms the vapour-check inner layer of insulated roof build-ups, helping maintain consistent internal temperatures in commercial setups.',
                'app_commercial_image' => 'img/HEXA-PROJECTS/liner-sheet-1.png',
                'app_industrial_title' => 'Industrial & Pharma Facilities',
                'app_industrial_desc' => 'A smooth, easy-to-clean surface that supports strict hygiene protocols and resists dust accumulation in heavy industrial and controlled environments.',
                'app_industrial_image' => 'img/HEXA-PROJECTS/liner-sheet-2.png',
                'details' => [
                    ['title' => 'Micro-Rib Profile', 'desc' => 'A shallow, closely spaced rib pattern gives the liner sheet stiffness during installation while presenting a clean, unobtrusive finish from below.', 'icon' => 'square'],
                    ['title' => 'Interior-Grade Coating', 'desc' => 'Formulated for indoor exposure, the coating resists yellowing, chalking and dust adhesion, keeping ceilings bright without repainting.', 'icon' => 'clock'],
                    ['title' => 'Vapour Control Support', 'desc' => 'Installed as part of a built-up system, the liner sheet acts as a barrier that helps manage condensation between insulation layers.', 'icon' => 'shield'],
                    ['title' => 'Hygienic Surface', 'desc' => 'A smooth, low-porosity finish resists bacterial growth and is simple to wipe down, meeting the housekeeping standards of food and pharma environments.', 'icon' => 'check'],
                    ['title' => 'Acoustic & Thermal Synergy', 'desc' => 'Combined with insulation, the liner sheet contributes to a quieter, better-insulated building envelope, reducing both noise transmission and energy loss.', 'icon' => 'acoustic'],
                    ['title' => 'Economy & Fast Build', 'desc' => 'Lightweight panels are quick to screw onto purlins, speeding up structural coverage and drying-in of building interiors.', 'icon' => 'lightning'],
                ],
            ],
            [
                'title' => 'C/Z Purlin',
                'slug' => 'cz-purlin',
                'badge' => 'Structural',
                'image_path' => 'img/PRODUCT-COVER-IMAGES/CZ-PURLIN.png',
                'hero_image' => 'img/PRODUCT-COVER-IMAGES/CZ-PURLIN.png',
                'hero_title' => 'The Hidden Backbone — Hexa Purlin Series',
                'hero_subtitle' => 'STRUCTURAL SUPPORT FRAMEWORK',
                'hero_desc' => 'Cold-formed C and Z section purlins engineered to carry roof and wall cladding loads efficiently, forming the structural framework behind every great steel building.',
                'drawing_image' => 'images/DRAWING/CZ-PURLIN1.png',
                'tech_details' => [
                    'GI / COLOR THICKNESS RANGE: 1.2 – 3.5 MM',
                    'Available: 80 GSM, 120 GSM, 275 GSM.',
                ],
                'specifications' => [
                    ['label' => 'PROFILE DEPTH', 'value' => '100–300mm'],
                    ['label' => 'THICKNESS RANGE', 'value' => '1.50mm – 3.00mm'],
                    ['label' => 'LOAD TYPE', 'value' => 'High Tensile 350 MPa'],
                ],
                'spec_bar' => [
                    ['label' => 'MATERIAL', 'value' => 'High-Tensile Galvanized Steel'],
                    ['label' => 'SECTIONS', 'value' => 'C-Type & Z-Type'],
                    ['label' => 'THICKNESS RANGE', 'value' => '1.6mm – 3.0mm'],
                    ['label' => 'YIELD STRENGTH', 'value' => '350 MPa Grade'],
                ],
                'app_heading' => 'High-Strength Structural Backbone',
                'app_commercial_title' => 'Commercial Buildings',
                'app_commercial_desc' => 'Lightweight yet high-strength, purlins keep overall structural steel tonnage and cost down without compromising safety in premium commercial architectures.',
                'app_commercial_image' => 'img/HEXA-PROJECTS/CZ-PRULIN-1.png',
                'app_industrial_title' => 'Industrial Sheds & Warehouses',
                'app_industrial_desc' => 'Provides primary structural support and continuous spans that reduce the number of columns needed across large factories and storage facilities.',
                'app_industrial_image' => 'img/HEXA-PROJECTS/CZ-PRULIN-2.png',
                'details' => [
                    ['title' => 'Cold-Formed Precision', 'desc' => 'Roll-formed to tight tolerances, our purlins ensure consistent bolt-hole alignment and straight, true installation across every bay.', 'icon' => 'shield'],
                    ['title' => 'Optimized Section Design', 'desc' => 'C and Z profiles are engineered for maximum bending strength per kilogram of steel, reducing material cost without sacrificing load capacity.', 'icon' => 'square'],
                    ['title' => 'Overlapping Z-Sections', 'desc' => 'Z-purlins are designed to overlap at supports, creating continuous-beam behaviour that increases span capability and reduces deflection.', 'icon' => 'alu-zinc'],
                    ['title' => 'Corrosion Protection', 'desc' => 'A galvanized coating guards against rust throughout the structure\'s lifetime, even in high-humidity industrial environments.', 'icon' => 'pin'],
                    ['title' => 'Load Versatility', 'desc' => 'Rated for a range of roof live loads, wind loads and seismic conditions, purlins are engineered to match your project\'s structural requirements.', 'icon' => 'acoustic'],
                    ['title' => 'Easy Site Handling', 'desc' => 'Standardized punching patterns and lightweight sections make purlins fast to transport, lift and bolt into place, accelerating overall build time.', 'icon' => 'lightning'],
                ],
            ],
            [
                'title' => 'Deck Sheet',
                'slug' => 'deck-sheet',
                'badge' => 'Composite',
                'image_path' => 'img/PRODUCT-COVER-IMAGES/DECK-SHEET.png',
                'hero_image' => 'img/PRODUCT-COVER-IMAGES/DECK-SHEET.png',
                'hero_title' => 'Strength Below the Surface — Hexa Deck Sheet',
                'hero_subtitle' => 'COMPOSITE DECKING SOLUTION',
                'hero_desc' => 'High-performance profiled decking that acts as permanent formwork for composite concrete slabs — faster to install, safer on site, and lighter on your structural steel bill.',
                'drawing_image' => 'images/DRAWING/DECK-SHEET1.png',
                'tech_details' => [
                    'THICKNESS RANGE: .60 – 1.5 mm',
                    'PROFILE DEPTH: 51 mm',
                ],
                'specifications' => [
                    ['label' => 'PROFILE DEPTH', 'value' => '50–75mm Composite'],
                    ['label' => 'THICKNESS RANGE', 'value' => '0.80mm – 1.20mm'],
                    ['label' => 'LOAD TYPE', 'value' => 'Composite Slab Rated'],
                ],
                'spec_bar' => [
                    ['label' => 'SUBSTRATE', 'value' => 'Galvanized Steel'],
                    ['label' => 'PROFILE DEPTH', 'value' => '50–75mm Composite'],
                    ['label' => 'THICKNESS RANGE', 'value' => '0.80mm – 1.20mm'],
                    ['label' => 'LOAD TYPE', 'value' => 'Composite Slab Rated'],
                ],
                'app_heading' => 'Composite Strength for Modern Buildings',
                'app_commercial_title' => 'Multi-Storey Commercial Buildings',
                'app_commercial_desc' => 'Acts as permanent formwork and positive reinforcement for composite floor slabs, speeding up floor-by-floor construction.',
                'app_commercial_image' => 'img/HEXA-PROJECTS/DECK-SHEET1.png',
                'app_industrial_title' => 'Industrial Platforms',
                'app_industrial_desc' => 'A safe, rigid working platform during construction that doubles as permanent structural decking once concrete is poured.',
                'app_industrial_image' => 'img/HEXA-PROJECTS/DECK-SHEET2.png',
                'details' => [
                    ['title' => 'Composite Action', 'desc' => 'Embossed ribs bond mechanically with poured concrete, allowing the steel deck to act as tensile reinforcement and reducing the need for additional rebar.', 'icon' => 'shield'],
                    ['title' => 'Reduced Concrete Volume', 'desc' => 'The profiled shape reduces the amount of concrete needed per square metre of slab, cutting both material cost and structural dead load.', 'icon' => 'square'],
                    ['title' => 'Faster Floor Cycles', 'desc' => 'Deck sheets double as a working platform immediately after installation, letting other trades proceed without waiting for temporary formwork removal.', 'icon' => 'lightning'],
                    ['title' => 'Site Safety', 'desc' => 'A stable, walkable surface from day one reduces fall risk and formwork-related site hazards during multi-storey construction.', 'icon' => 'check'],
                    ['title' => 'Span Efficiency', 'desc' => 'Deep profiles allow longer unpropped spans between beams, reducing propping requirements and simplifying site logistics.', 'icon' => 'alu-zinc'],
                    ['title' => 'Corrosion-Protected Core', 'desc' => 'A galvanized coating protects the steel deck through the construction phase and for the lifetime of the finished structure.', 'icon' => 'clock'],
                ],
            ],
        ];

        foreach ($products as $prod) {
            \App\Models\Product::updateOrCreate(['slug' => $prod['slug']], $prod);
        }

        // Seed Projects
        $projects = [
            ['title' => 'CZ Purlin Project 1', 'category' => 'cz-purlin', 'image_path' => 'img/HEXA-PROJECTS/CZ-PRULIN-1.png'],
            ['title' => 'CZ Purlin Project 2', 'category' => 'cz-purlin', 'image_path' => 'img/HEXA-PROJECTS/CZ-PRULIN-2.png'],
            ['title' => 'Standing Seam Project 1', 'category' => 'standing-seam', 'image_path' => 'img/HEXA-PROJECTS/Standing-Seam-Sheet1.png'],
            ['title' => 'Standing Seam Project 2', 'category' => 'standing-seam', 'image_path' => 'img/HEXA-PROJECTS/Standing-Seam-Sheet2.png'],
            ['title' => 'Circular Sheet Project 1', 'category' => 'circular', 'image_path' => 'img/HEXA-PROJECTS/circular-sheet-1.png'],
            ['title' => 'Circular Sheet Project 2', 'category' => 'circular', 'image_path' => 'img/HEXA-PROJECTS/circular-sheet-2.png'],
            ['title' => 'Trapezoidal Project 1', 'category' => 'trapezoidal', 'image_path' => 'img/HEXA-PROJECTS/Trapezoidal-Sheet1.png'],
            ['title' => 'Trapezoidal Project 2', 'category' => 'trapezoidal', 'image_path' => 'img/HEXA-PROJECTS/Trapezoidal-Sheet2.png'],
            ['title' => 'Liner Project 1', 'category' => 'liner', 'image_path' => 'img/HEXA-PROJECTS/liner-sheet-1.png'],
            ['title' => 'Liner Project 2', 'category' => 'liner', 'image_path' => 'img/HEXA-PROJECTS/liner-sheet-2.png'],
            ['title' => 'Deck Sheet Project 1', 'category' => 'deck-sheet', 'image_path' => 'img/HEXA-PROJECTS/DECK-SHEET1.png'],
            ['title' => 'Deck Sheet Project 2', 'category' => 'deck-sheet', 'image_path' => 'img/HEXA-PROJECTS/DECK-SHEET2.png'],
        ];

        foreach ($projects as $proj) {
            \App\Models\Project::updateOrCreate(['image_path' => $proj['image_path']], $proj);
        }

        // Seed ResourceItems (PDF downloads for /resources page)
        $resources = [
            [
                'title' => 'Main Brochure',
                'icon_type' => 'brochure',
                'description' => 'Comprehensive catalog of our complete product range and technical specifications.',
                'link_text' => 'Download PDF',
            ],
            [
                'title' => 'Product Manual',
                'icon_type' => 'manual',
                'description' => 'Step-by-step installation guides and maintenance tips for sheets.',
                'link_text' => 'Download PDF',
            ],
            [
                'title' => 'Technical Specs',
                'icon_type' => 'specs',
                'description' => 'Detailed material properties, load capacity tables, and environmental certifications.',
                'link_text' => 'Download PDF',
            ],
        ];

        foreach ($resources as $res) {
            \App\Models\ResourceItem::updateOrCreate(['title' => $res['title']], $res);
        }

        // Seed Blogs for homepage & blog details
        $this->call(BlogSeeder::class);
    }
}
