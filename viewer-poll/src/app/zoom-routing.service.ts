import { Inject, Injectable } from '@angular/core';
import { DOCUMENT } from '@angular/common';
import { HttpClient } from '@angular/common/http';
import { Observable } from 'rxjs';

@Injectable({
  providedIn: 'root'
})
export class ZoomRoutingService {

  /**
   * The URL for the Sample Data.
   */
  private zoomUrl: string;

  /**
   *
   * @param http The http Client.
   * @param baseUrl The Base Url for the service.
   */
  constructor(
    private http: HttpClient,
    @Inject('BASE_URL') baseUrl: string,
    @Inject(DOCUMENT) private document: Document) {
      this.zoomUrl = baseUrl + 'zoom';
  }

  goToElderQuorum(): void {
    this.document.location.href = this.zoomUrl + '/eq.php';
  }

  goToReliefSociety(): void {
    this.document.location.href = this.zoomUrl + '/rs.php';
  }

  goToSundaySchool(): void {
    this.document.location.href = this.zoomUrl + '/ss.php';
  }
}
