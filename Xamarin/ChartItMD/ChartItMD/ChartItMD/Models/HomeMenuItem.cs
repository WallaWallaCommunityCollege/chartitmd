using System;
using System.Collections.Generic;
using System.Text;

namespace ChartItMD.Models
{
    public enum MenuItemType
    {
        OpenPatient,
        PatientProfile,
        Orders,
        Medications,
        LabReports,
        Admission,
        DrNotes,
        NuresNotes,
        ConsentForms,
        About
    }
    public class HomeMenuItem
    {
        public MenuItemType Id { get; set; }

        public string Title { get; set; }
    }
}
