using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Text;

namespace ChartItMD.ViewModels
{
    
    class PatientIDBarViewModel : INotifyPropertyChanged
    {
        public string patientName;
        public string patientDOB;
        public string patientAge;
        public string patientBioGender;
        public string patientGenderID;
        public string patientID;
        public string PatientName {
            get {
                patientName = App.CURRENTPATIENTIDDATA.patient_firstname + " " + App.CURRENTPATIENTIDDATA.patient_lastname;
                return patientName;
            }
            set {
                patientName = App.CURRENTPATIENTIDDATA.patient_firstname + " " + App.CURRENTPATIENTIDDATA.patient_lastname;
                 PropertyChanged(this, new PropertyChangedEventArgs("PatientName"));
            }
        }
        public string PatientDOB
        {
            get {
                patientDOB = App.CURRENTPATIENTIDDATA.patient_dob;
                return patientDOB;
            }
            set {
                patientDOB = value; PropertyChanged(this, new PropertyChangedEventArgs("PatientDOB"));
            }
        }
        public string PatientAge
        {
            get {
                int birthyear = int.Parse(this.patientDOB.Substring(0, 4));
                int birthmonth = int.Parse(this.patientDOB.Substring(5, 2));
                int birthday = int.Parse(this.patientDOB.Substring(8, 2));

                DateTime dob = new DateTime(birthyear,birthmonth,birthday);
                int age = DateTime.Now.Year - dob.Year;
                if (dob.DayOfYear >= DateTime.Now.DayOfYear)
                    age--;

                patientAge = age.ToString();
                return patientAge;
            }
            set {
                int birthyear = int.Parse(this.patientDOB.Substring(0, 4));
                int birthmonth = int.Parse(this.patientDOB.Substring(5, 2));
                int birthday = int.Parse(this.patientDOB.Substring(8, 2));

                DateTime dob = new DateTime(birthyear, birthmonth, birthday);
                int age = DateTime.Now.Year - dob.Year;
                if (dob.DayOfYear >= DateTime.Now.DayOfYear)
                    age--;

                patientAge = age.ToString();
            }
        }
        public string PatientBioGender
        {
            get {
                return patientBioGender;
            }
            set {
                patientBioGender = value; PropertyChanged(this, new PropertyChangedEventArgs("PatientBioGender"));
            }
        }
        public string PatientGenderID
        {
            get {
                return patientGenderID;
            }
            set {
                patientGenderID = value; PropertyChanged(this, new PropertyChangedEventArgs("PatientGenderID"));
            }
        }
        public string PatientID
        {
            get{
                patientID = App.CURRENTPATIENTIDDATA.patient_id;
                return patientID;
            }
            set {
                patientID = App.CURRENTPATIENTIDDATA.patient_id;
                PropertyChanged(this, new PropertyChangedEventArgs("PatientID"));
            }
        }
        public event PropertyChangedEventHandler PropertyChanged;
        
    }

}
