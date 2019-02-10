using System;
using System.Collections.Generic;
using System.Text;

namespace ChartMD.Models
{
    public class Patient
    {
        public Patient()
        {
            

        }
        public string PatientId { get; set; }
        public string FirstName
        {
            get; set;
        }
        public string patient_id { get; set; }
        public string patient_firstname { get; set; }
        public string patient_lastname { get; set; }
        public string patient_dob { get; set; }
        public string LastName { get; set; }
        public string Gender { get; set; }
        public DateTime DateOfBirth { get; set; }
        public List<MeasuredValue> MeasuredValues { get; set; }
        public List<Prescription> Prescriptions { get; set; }
        public List<Order> Orders { get; set; }
        public ContactInfo ContactInfo { get; set; }
        public bool PushToDB()
        {
            return true;
        }
        public bool PullFromDB()
        {
            return true;
        }

    }
}
