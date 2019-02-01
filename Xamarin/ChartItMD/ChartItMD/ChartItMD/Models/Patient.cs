using System;
using System.Collections.Generic;
using System.Text;

namespace ChartMD.Models
{
    public class Patient
    {
        public Patient()
        {
            this.PatientId = 0;
            this.FirstName = "James";
            this.LastName = "wood";
            this.Gender = "male";
            this.DateOfBirth = DateTime.Now;

        }
        public Int64 PatientId { get; set; }
        public string FirstName
        {
            get; set;
        }
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
