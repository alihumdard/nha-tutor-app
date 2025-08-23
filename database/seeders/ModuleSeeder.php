<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Module;
use Illuminate\Support\Str;

class ModuleSeeder extends Seeder
{
    public function run()
    {
        $modules = [
            'core' => [
                'Quality of Care', 'Medical and Nursing Care Practices', 'Medication Management and Administration', 
                'Disease Management (e.g., acute vs. chronic conditions)', 'Nutrition and Hydration (e.g., specialized diets)',
                'Activities of Daily Living (ADLs) and Independent Activities of Daily Living (IADLs))', 'Rehabilitation and Restorative Programs',
                'Care Recipient Assessment and Interdisciplinary Care Planning', 'Clinical and Medical Records and Documentation Requirements e.g., storage, retention',
                'Medical Director', 'Emergency Medical Services (e.g., CPR, first aid,Heimlich maneuver, AED)',
                'Transition of Care (e.g., admission, move-in, transfer, discharge, and move-out)', 'Basic Healthcare Terminology',
                'Quality of Life', 'Psychosocial Needs (e.g., social, spiritual, community,cultural)', 'Person-Centered Care and Comprehensive Care Planning',
                'Person-Centered Environment (e.g., home-like environment)', 'Care Recipient Bill of Rights and Responsibilities',
                'Care Recipient Safety (e.g., fall prevention, elopement prevention, adverse events)', 'Care Recipient (and Representative) Grievance, Conflict, and Dispute Resolution',
                'Care Recipient Advocacy (e.g., Ombudsman, resident and family council)', 'Care Recipient Decision-Making (e.g., capacity, power of attorney, guardianship,conservatorship, code status, advance directives, ethical decision-making)',
                'Care Recipient (and Representative) Satisfaction', 'Recognition of Maltreatment (e.g., abuse, neglect, exploitation)',
                'Mental and Behavioral Health (e.g., cognitive impairment, depression, social support systems)', 'Trauma-Informed Care (e.g., PTSD)',
                'Pain Management', 'Death, Dying, and Grief', 'Restraint Usage and Reduction', 'Foodservice (e.g., choice and menu planning, dietary management, food storage and handling, dining services)',
                'Social Services Programs', 'Therapeutic Recreation and Activity Programs', 'Community Resources, Programs, and Agencies (e.g., meals on wheels, housing vouchers, Area Agencies on Aging,Veterans Affairs)',
                'Ancillary Services', 'Hospice and Palliative Care', 'Specialized Medical Equipment (e.g., oxygen, durable medical equipment)',
                'Transportation for Care Recipients', 'Telemedicine (e.g., e-health)', 'Diagnostic Services (e.g., radiology, lab services)',
                'Dental and Oral Care Services', 'Healthcare Partners and Clinical Providers (e.g., MD/DO, Nurse Practitioner, Psychiatrist, Podiatrist, Dentist)',
                'Volunteer Programs', 'Financial Management', 'Budgeting and Forecasting', 'Financial Analysis (e.g., ratios, profitability, debt, revenue mix, depreciation, operating margin, cash flow)',
                'Revenue Cycle Management (e.g., billing, accounts receivable, accounts payable, collections)', 'Financial Statements (e.g., income/revenue statement, balance sheet, statement of cash flows, cost reporting)',
                'Revenue and Reimbursement (e.g., PDPM, PDGM, ACOs, HMOs,Medicaid, private payors)', 'Financial Reporting Requirements (e.g., requirements for not-for-profit, for-profit, and governmental providers)',
                'Integration of Clinical and Financial Systems (e.g., EMR/EHR, MDS)', 'Internal Financial Management Controls (e.g., segregation of duties, access)',
                'Supply-Chain Management (e.g., inventory control)', 'Resident Trust Accounts for Personal Funds', 'Risk Management',
                'OSHA Rules and Regulations', 'Workers Compensation', 'Ethical Conduct and Standards of Practice', 'Care Setting',
                'Federal Codes and Regulations for Building, Equipment, Maintenance, and Grounds', 'Safety and Accessibility (e.g., ADA, safety data sheets)',
                'Facility Management and Environmental Services', 'Preventative and Routine Maintenance Programs (e.g., pest control, equipment, mechanical systems)',
                'Infection Control and Sanitation (e.g., linens, kitchen, hand washing, healthcare-acquired infections, hazardous materials)', 'Disaster and Emergency Planning, Preparedness, Response,and Recovery (e.g., Appendix Z)',
                'Leadership', 'Organizational Structures (e.g., departments, functions,systemic processes)', 'Organizational Change Management',
                'Organizational Behavior (e.g., organizational culture,team building, group dynamics)', 'Leadership Principles (e.g., communication, styles,mentoring, coaching, personal professional development)',
                'Governance (e.g., board of directors, governing bodies,corporate entities, advisory boards)', 'Professional Advocacy and Governmental Relations',
                'Organizational Strategy', 'Mission, Vision, and Value Statements', 'Strategic Business Planning (e.g., new lines of service,succession management, staffing pipeline)',
                'Specialized Rehabilitation or Skilled Services', 'Durable Medical Equipment (DME) and Assistive Devices', 'Laboratory Services',
                'Sexual Expression and Intimacy Needs', 'Telehealth and Remote Monitoring Systems', 'Financial Planning, Budgeting, Cash Flow, and Cost Containment',
                'Payroll Management', 'Capital Expenditures and Asset Management', 'Vendor and Supply Chain Management', 'Risk Mitigation Measures',
                'Emergency Response Systems', 'Resident Incident Management Systems', 'Human Resource Planning, Recruitment, and Retention',
                'Compliance Programs', 'Risk Management Process and Programs', 'Quality Improvement Processes (e.g., root cause analysis, PDCA/PDSA)',
                'Scope of Practice and Legal Liability', 'Internal Investigation Protocols and Techniques', 'Mandatory Reporting Requirements',
                'Insurance Coverage (e.g., liability, property)', 'Healthcare Record Requirements (e.g., HIPAA, HITECH)', 'Security (e.g., cameras, locks)',
                'Contracted Services',
            ],
            'los' => [
                'Care, Services, and Support, Operation, Environment and Quality', 'Quality of Care', 'Medical and Nursing Care Practices', 'Medication Management and Administration',
                'Nutrition and Hydration', 'Rehabilitation and Restorative Programs', 'Care Recipient Assessment and Interdisciplinary Care Planning',
                'Clinical and Medical Records and Documentation Requirements', 'Medical Director', 'Emergency Medical Services',
                'Transition of Care', 'Quality of Life', 'Psychosocial Needs', 'Person-Centered Care and Comprehensive Care Planning',
                'Care Recipient Bill of Rights and Responsibilities', 'Care Recipient Safety', 'Care Recipient Grievance, Conflict, and Dispute Resolution',
                'Care Recipient Advocacy', 'Care Recipient Decision-Making', 'Recognition of Maltreatment', 'Mental and Behavioral Health',
                'Trauma-Informed Care', 'Pain Management', 'Death, Dying, and Grief', 'Restraint Usage and Reduction', 'Foodservices',
                'Social Services Programs', 'Therapeutic Recreation and Activity Programs', 'Hospice and Palliative Care', 'Transportation for Care Recipients',
                'Diagnostic Services', 'Dental and Oral Care Services', 'Healthcare Partners and Clinical Providers', 'Volunteer Programs',
                'Financial Management', 'Revenue and Reimbursement', 'Financial Reporting Requirements', 'Integration of Clinical and Financial Systems',
                'Resident Trust Accounts for Personal Funds', 'Risk Management', 'OSHA Rules and Regulations', 'Compliance Programs',
                'Scope of Practice and Legal Liability', 'Internal Investigation Protocols and Techniques', 'Mandatory Reporting Requirements',
                'Healthcare Record Requirements', 'Security', 'Contracted Services', 'Human Resources', 'Organizational Staffing Requirements and Reporting',
                'Staff Certification and Licensure Requirements', 'Professional Development', 'Employee Training and Orientation', 'Performance Evaluation',
                'Employee Record-Keeping Requirements', 'Cultural Competence and Diversity Awareness', 'Care Setting', 'Federal Codes and Regulations for Building, Equipment, Maintenance, and Grounds',
                'Person-Centered Environment', 'Safety and Accessibility', 'Facility Management and Environmental Services', 'Preventative and Routine Maintenance Programs',
                'Infection Control and Sanitation', 'Disaster and Emergency Planning, Preparedness, Response, and Recovery', 'Federal Healthcare Laws, Rules, and Regulations',
                'Government Programs and Entities', 'Certification and Licensure Requirements for the Organization', 'Regulatory Survey and Inspection Process',
                'Procedures for Informal Dispute Resolution', 'Centers for Medicare and Medicaid Services Quality Measures', 'Quality Assurance and Performance Improvement',
                'Bed-Hold Requirements', 'Pre-Admission Screening and Annual Review', 'Facility Assessment', 'Infection Prevention and Control Practices',
                'Disease Management (e.g., acute vs. chronic conditions)', 'Activities of Daily Living (ADLs) and Independent Activities of Daily Living (IADLs)',
            ]
        ];

        foreach ($modules as $category => $titles) {
            foreach ($titles as $title) {
                Module::updateOrCreate(
                    ['slug' => Str::slug($title), 'category' => $category],
                    ['title' => $title]
                );
            }
        }
    }
}